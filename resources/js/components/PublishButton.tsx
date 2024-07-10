import ReactDOM from "react-dom/client"
import { useMemo, useState } from "react"
import axios from "axios"
import type { Podcast } from "../types"

type PublishButtonProps = {
    dataPodcast: Podcast
}

export default function PublishButton({ dataPodcast }: PublishButtonProps) {

    const [podcast, setPodcast] = useState(dataPodcast)
    const [hovering, setHovering] = useState(false)
    const [working, setWorking] = useState(false)

    const publishedText = useMemo(() => hovering ? 'Unpublish' : 'Published', [hovering])

    const publish = () => {
        setWorking(true)

        axios.post('/published-podcasts', { podcast_id: podcast.id })
            .then(response => {
                setPodcast(response.data)
                setWorking(false)
                setHovering(false)
            })
    }

    const unpublish = () => {
        setWorking(true)

        axios.delete(`/published-podcasts/${podcast.id}`)
            .then(response => {
                setPodcast(response.data)
                setWorking(false)
                setHovering(false)
            })
    }

    return (
        <>
            {podcast.published ? (
                <button
                    type="button"
                    className={`btn btn-sm ${working ? 'btn-loading btn-outline-secondary' : (hovering ? 'btn-danger' : 'btn-primary')}`}
                    onMouseEnter={() => setHovering(true)}
                    onMouseLeave={() => setHovering(false)}
                    onClick={unpublish}
                    disabled={working}
                >{publishedText}</button>
            ) : (
                <button
                    type="button"
                    className={`btn btn-sm btn-outline-secondary ${working ? 'btn-loading' : ''}`}
                    onClick={publish}
                    disabled={working}
                >Publish</button>
            )}
        </>
    )
}

if (document.getElementById('publish-button')) {

    const podcastJson = document.getElementById('publish-button')!.getAttribute('data-podcast') ?? '{}'
    const podcast: Podcast = JSON.parse(podcastJson)

    ReactDOM.createRoot(
        document.getElementById('publish-button')!
    ).render(
        <PublishButton dataPodcast={podcast} />
    )
}
