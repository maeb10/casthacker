<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use App\Classes\Json;
use App\Models\Podcast;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PodcastSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $otherUser = User::find(1);
        $me        = User::find(2);

        Podcast::factory()->published()->create([
            'user_id' => $otherUser,
            'title' => 'The Indie Hackers Podcast',
            'description' => "Learn from the developers behind profitable online businesses. Validate your idea, find customers, and become financially independent!",
            'website' => 'http://indiehackers.com',
            'cover_path' => 'images/podcast-art/indie-hackers.jpeg',
        ]);

        $podcast = Podcast::factory()->published()->create([
            'user_id' => $me,
            'title' => 'Full Stack Radio',
            'description' => "A podcast for developers interested in building great software products.",
            'website' => 'http://fullstackradio.com',
            'cover_path' => 'images/podcast-art/full-stack-radio.jpeg',
        ]);
        $this->addEpisodes($podcast, 'fullstackradio.json');

        $podcast = Podcast::factory()->published()->create([
            'user_id' => $otherUser,
            'title' => 'The Bike Shed',
            'description' => "On The Bike Shed, hosts Derek Prior, Sean Griffin, Amanda Hill, and guests discuss their development experience and challenges with Ruby, Rails, JavaScript, and whatever else is drawing their attention, admiration, or ire this week.",
            'website' => 'http://bikeshed.fm',
            'cover_path' => 'images/podcast-art/bike-shed.jpeg',
        ]);
        $this->addEpisodes($podcast, 'bikeshed.json');

        $podcast = Podcast::factory()->published()->create([
            'user_id' => $otherUser,
            'title' => 'Dads in Development',
            'description' => "A podcast about dads and geeky stuff.",
            'website' => 'http://dadsindev.com',
            'cover_path' => 'images/podcast-art/dads-in-dev.jpeg',
        ]);
        $this->addEpisodes($podcast, 'dadsindev.json');

        $podcast = Podcast::factory()->published()->create([
            'user_id' => $otherUser,
            'title' => 'Giant Robots Smashing Into Other Giant Robots',
            'description' => "A weekly podcast discussing the design, development, and business of great software.",
            'website' => 'http://giantrobots.fm',
            'cover_path' => 'images/podcast-art/giant-robots.jpeg',
        ]);
        $this->addEpisodes($podcast, 'giantrobots.json');

        $podcast = Podcast::factory()->published()->create([
            'user_id' => $otherUser,
            'title' => 'Bootstrapped',
            'description' => "25+ Years of Software Bootstrapping Experience.",
            'website' => 'http://bootstrapped.fm',
            'cover_path' => 'images/podcast-art/bootstrapped.jpeg',
        ]);

        $podcast = Podcast::factory()->published()->create([
            'user_id' => $otherUser,
            'title' => 'The Laracasts Snippet',
            'description' => "Each episode offers a single thought on some aspect of web development. Nothing more, nothing less. Hosted by Jeffrey Way.",
            'website' => 'http://laracasts.audio',
            'cover_path' => 'images/podcast-art/laracasts-snippet.jpeg',
        ]);
        $this->addEpisodes($podcast, 'laracasts.json');

        $podcast = Podcast::factory()->published()->create([
            'user_id' => $otherUser,
            'title' => 'Syntax',
            'description' => "Wes Bos and Scott Tolinski are two full stack web developers who like to break down complex topics and make them easy to understand.",
            'website' => 'http://syntax.fm',
            'cover_path' => 'images/podcast-art/syntax.png',
        ]);

        $podcast = Podcast::factory()->published()->create([
            'user_id' => $otherUser,
            'title' => 'The Five-Minute Geek Show',
            'description' => "Five Minutes of Geek, Twice a Week.",
            'website' => 'http://fiveminutegeekshow.com',
            'cover_path' => 'images/podcast-art/five-minute-geek-show.jpeg',
        ]);
        $this->addEpisodes($podcast, 'geekshow.json');

        $podcast = Podcast::factory()->published()->create([
            'user_id' => $otherUser,
            'title' => 'MegaMaker',
            'description' => "For digital makers who want to earn a living from the things they create. Indie software developers, designers, writers, entrepreneurs, artists, and other creatives!",
            'website' => 'http://megamaker.co',
            'cover_path' => 'images/podcast-art/megamaker.jpeg',
        ]);
        $this->addEpisodes($podcast, 'megamaker.json');

        $podcast = Podcast::factory()->published()->create([
            'user_id' => $otherUser,
            'title' => 'The Art Of Product',
            'description' => "From the former co-hosts of Giant Robots Smashing Into Other Giant Robots, comes The Art of Product. Join Derrick and Ben each week as they discuss code, product, entrepreneurship, and business.",
            'website' => 'http://artofproductpodcast.com',
            'cover_path' => 'images/podcast-art/the-art-of-product.jpeg',
        ]);
        $this->addEpisodes($podcast, 'artofproduct.json');

        $podcast = Podcast::factory()->published()->create([
            'user_id' => $otherUser,
            'title' => 'North Meets South Web Podcast',
            'description' => "Jacob Bennett and Michael Dyrynda conquer a 14.5 hour time difference to talk about life as web developers.",
            'website' => 'http://northmeetssouth.audio',
            'cover_path' => 'images/podcast-art/north-meets-south.jpg',
        ]);
        $this->addEpisodes($podcast, 'northmeetssouth.json');

        $podcast = Podcast::factory()->published()->create([
            'user_id' => $otherUser,
            'title' => 'Twenty Percent Time',
            'description' => "Two developers from Tighten discuss one programming topic every Friday in less than 20 minutes.",
            'website' => 'http://twentypercent.fm',
            'cover_path' => 'images/podcast-art/twenty-percent-time.jpeg',
        ]);
        $this->addEpisodes($podcast, 'twentypercent.json');

        $podcast = Podcast::factory()->published()->create([
            'user_id' => $otherUser,
            'title' => 'Laravel News',
            'description' => "The Laravel News Podcast brings you all the latest news and events related to Laravel.",
            'website' => 'http://laravel-news.com',
            'cover_path' => 'images/podcast-art/laravel-news.jpeg',
        ]);
        $this->addEpisodes($podcast, 'laravelnews.json');

        $podcast = Podcast::factory()->published()->create([
            'user_id' => $otherUser,
            'title' => 'Founder Chats',
            'description' => "Each week Baremetrics Founder, Josh Pigford, sits down with a different founder to talk shop.",
            'website' => 'http://founderchats.com',
            'cover_path' => 'images/podcast-art/founder-chats.jpeg',
        ]);

        $podcast = Podcast::factory()->published()->create([
            'user_id' => $otherUser,
            'title' => 'Bootstrapped With Kids',
            'description' => "Each week Brecht and Scott talk about making a living on the internet, email marketing, conversion rate optimization, website traffic, landing page optimization, how to start an internet business, and more. Its not a show about \"passive income\", its a show about financial independence and freedom and how we're achieving it while still managing the responsibilities of being a father.",
            'website' => 'http://bootstrappedwithkids.com',
            'cover_path' => 'images/podcast-art/bootstrapped-with-kids.jpeg',
        ]);
        $this->addEpisodes($podcast, 'bswk.json');

        $podcast = Podcast::factory()->published()->create([
            'user_id' => $otherUser,
            'title' => 'Chasing Product',
            'description' => "Helping developers transition from client work to launching products.",
            'website' => 'http://chasingproduct.com',
            'cover_path' => 'images/podcast-art/chasing-product.png',
        ]);

        $podcast = Podcast::factory()->published()->create([
            'user_id' => $otherUser,
            'title' => 'Ruby on Rails Podcast',
            'description' => "The Ruby on Rails Podcast, a weekly conversation about Ruby on Rails, open source software, and the programming profession. Hosted by Kyle Daigle.",
            'website' => 'http://5by5.tv/rubyonrails',
            'cover_path' => 'images/podcast-art/ruby-on-rails-podcast.jpeg',
        ]);

        $podcast = Podcast::factory()->published()->create([
            'user_id' => $otherUser,
            'title' => "Founder's Journery",
            'description' => "A weekly podcast by Josh Pigford, founder of Baremetrics, on his journey growing a startup.",
            'website' => 'http://baremetrics.com',
            'cover_path' => 'images/podcast-art/founders-journey.jpeg',
        ]);

        $podcast = Podcast::factory()->published()->create([
            'user_id' => $otherUser,
            'title' => 'Tentative',
            'description' => "Tentative is a podcast about digital product design.",
            'website' => 'http://tentative.fm',
            'cover_path' => 'images/podcast-art/tentative.jpeg',
        ]);
        $this->addEpisodes($podcast, 'tentative.json');

        $podcast = Podcast::factory()->published()->create([
            'user_id' => $otherUser,
            'title' => 'Bootstrapped Web',
            'description' => "For entrepreneurs who are bootstrapping startups and building a business online.",
            'website' => 'http://bootstrappedweb.com',
            'cover_path' => 'images/podcast-art/bootstrapped-web.jpeg',
        ]);

        $podcast = Podcast::factory()->published()->create([
            'user_id' => $otherUser,
            'title' => 'The Laravel Podcast',
            'description' => "The Laravel Podcast brings you Laravel and PHP development news and discussion. The podcast is hosted by Matt Stauffer and regular guests include Taylor Otwell (the creator of Laravel) and Jeffrey Way (the creator of Laracasts).",
            'website' => 'http://laravelpodcast.com',
            'cover_path' => 'images/podcast-art/laravel-podcast.jpeg',
        ]);
        $this->addEpisodes($podcast, 'laravelpodcast.json');

        $podcast = Podcast::factory()->published()->create([
            'user_id' => $otherUser,
            'title' => 'Startups For The Rest Of Us',
            'description' => "The podcast that helps developers, designers and entrepreneurs be awesome at launching software products. Whether you’ve built your first product or are just thinking about it.",
            'website' => 'http://startupsfortherestofus.com',
            'cover_path' => 'images/podcast-art/startups-for-the-rest-of-us.png',
        ]);

        $podcast = Podcast::factory()->published()->create([
            'user_id' => $otherUser,
            'title' => 'The Startup Chat',
            'description' => "Unfiltered insights and actionable advice straight from the trenches of startup and business life.",
            'website' => 'http://thestartupchat.com',
            'cover_path' => 'images/podcast-art/startup-chat.jpeg',
        ]);
    }

    private function addEpisodes($podcast, $episodeFile): void
    {
        $episodes = Json::load(database_path('seeders/episodes/'.$episodeFile));

        foreach (collect($episodes['items'])->reverse()->values() as $i => $episode) {

            if (!isset ($episode['attachments']['url'])) {
                $episode['attachments'] = $episode['attachments'][0];
            }

            $podcast->episodes()->create([
              'number' => $i + 1,
              'title' => $episode['title'],
              'url' => $episode['url'] ?? $podcast->website,
              'content_text' => $episode['content_text'],
              'content_html' => $episode['content_html'],
              'published_at' => Carbon::parse($episode['date_published']),
              'download_url' => $episode['attachments']['url'],
              'duration' => $episode['attachments']['duration_in_seconds'],
            ]);
        }
    }
}
