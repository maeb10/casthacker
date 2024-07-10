export type Podcast = {
    id: number,
    user_id: number,
    title: string,
    description: string,
    website: string,
    cover_path: string,
    published_at: string,
    created_at: string,
    updated_at: string,
    cover_url: string,
    published: boolean,
    subscribed: boolean,
    links: {
        update_cover_image: string,
    }
}

export type Subscription = {
    id: number,
    user_id: number,
    podcast_id: number,
    created_at: string,
    updated_at: string
}
