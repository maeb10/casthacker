import ReactDOM from "react-dom/client"
import { useMemo, useState } from "react"
import axios from 'axios'
import type { Podcast, Subscription } from "../types"

type SubscriptionButtonProps = {
    dataSubscription: Subscription | null,
    podcast: Podcast
}

function SubscribeButton({ dataSubscription, podcast }: SubscriptionButtonProps) {
    const [hovering, setHovering] = useState(false)
    const [subscription, setSubscription] = useState(dataSubscription)
    const [working, setWorking] = useState(false)

    const subscribed = useMemo(() => subscription !== null, [subscription])
    const subscribedText = useMemo(() => hovering ? 'Unsubscribe' : 'Subscribed', [hovering])

    const subscribe = () => {
        setWorking(true)

        axios.post('/subscriptions', { podcast_id: podcast.id })
            .then(response => {
                setSubscription(response.data);
                setWorking(false)
                setHovering(false)
            })
            .catch(error => {
                console.log(error);
            })
    }

    const unsubscribe = () => {
        setWorking(true)

        axios.delete(`/subscriptions/${subscription?.id}`)
            .then(() => {
                setSubscription(null)
                setWorking(false)
                setHovering(false)
            })
            .catch(error => {
                console.log(error);
            })
    }

    return (
        <>
            {subscribed ? (
                <button
                    type="button"
                    className={`btn btn-sm ${working ? 'btn-loading btn-outline-secondary' : (hovering ? 'btn-danger' : 'btn-primary')}`}
                    onMouseEnter={() => setHovering(true)}
                    onMouseLeave={() => setHovering(false)}
                    onClick={unsubscribe}
                    disabled={working}
                >{subscribedText}</button>
            ) : (
                <button
                    type="button"
                    className={`btn btn-sm btn-outline-secondary ${working ? 'btn-loading' : ''}`}
                    onClick={subscribe}
                    disabled={working}
                >Subscribe</button>
            )}
        </>
    )
}

if (document.getElementById('subscribe-button')) {
    const podcastJson = document.getElementById('subscribe-button')!.getAttribute('data-podcast') ?? '{}'
    const podcast: Podcast = JSON.parse(podcastJson)

    const subscriptionJson = document.getElementById('subscribe-button')!.getAttribute('data-subscription') ?? '{}'
    const subscription: Subscription | null = JSON.parse(subscriptionJson)

    ReactDOM.createRoot(
        document.getElementById('subscribe-button')!
    ).render(
        <SubscribeButton podcast={podcast} dataSubscription={subscription} />
    )
}
