<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Casthacker | @yield('title')</title>
        @viteReactRefresh
        @vite(['resources/sass/app.scss', 'resources/js/app.ts'])
    </head>
    <body>
        <div class="min-vh-100 d-flex flex-column">
            <div class="container">
                <div class="py-5">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <a href="/" class="fs-4 fw-bold text-reset text-decoration-none">&lt;casthacker/&gt;</a>
                        </div>
                        <div>
                            <a href="{{ route('podcasts.index') }}" class="fw-semibold me-5 text-reset text-decoration-none">Podcasts</a>
                            <a href="/episodes" class="fw-semibold text-reset text-decoration-none">Episodes</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mw-100 flex-fill">
                @yield('body')
            </div>

            <div class="container">
                <div class="border-top text-center fs-6 mt-5 py-5 fw-lighter">
                    &copy; {{ date('Y') }} NothingWorks Inc.
                </div>
            </div>
        </div>
    </body>
</html>
