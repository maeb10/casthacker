import ReactDOM from "react-dom/client"
import React, { useMemo, useState } from "react";
import type { Podcast } from "../types";

type CoverImageUploadProps = {
    podcast: Podcast
}

function CoverImageUpload({ podcast }: CoverImageUploadProps) {

    const [newImage, setNewImage] = useState<string | null>(null)
    const csrfToken = document.head.querySelector('meta[name="csrf-token"]')?.getAttribute('content') ?? ''
    const action = podcast.links.update_cover_image

    const previewSrc = useMemo(() => newImage ? newImage : podcast.cover_url, [newImage])

    function updateImagePreview(e: React.ChangeEvent<HTMLInputElement>) {
        const files = e.target.files

        if (!files || files.length === 0) {
            setNewImage(null)
            return
        }

        const reader = new FileReader()

        reader.onload = (e) => {
            if (e.target && e.target.result) {
                setNewImage(e.target.result.toString())
            }
        }

        reader.readAsDataURL(files[0])
    }


    return (
        <form action={action} method="POST" encType="multipart/form-data">
            <input type="hidden" name="_token" value={csrfToken} />
            <input type="hidden" name="_method" value="PUT" />
            <div className="row">
                <div className="col-4">
                    <img src={previewSrc} className="img-fluid" />
                </div>
                <div className="col-8 d-flex align-items-end">
                    <div className="flex-fill mw-100">
                        <div className="mb-5 d-flex align-items-center justify-content-center">
                            <input name="cover_image" type="file" className="form-control" onChange={updateImagePreview} />
                        </div>
                        <div className="text-end">
                            <button className="btn btn-sm btn-primary" disabled={newImage === null}>Save Image</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    );
}

if (document.getElementById('cover-image-upload')) {
    const podcastJson = document.getElementById('cover-image-upload')!.getAttribute('data-podcast') ?? '{}'
    const podcast: Podcast = JSON.parse(podcastJson)

    ReactDOM.createRoot(
        document.getElementById('cover-image-upload')!
    ).render(
        <CoverImageUpload podcast={podcast} />
    )
}
