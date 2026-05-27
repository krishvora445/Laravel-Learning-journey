<x-layout title="Home">
    <section class="hero rounded-box border border-base-300 bg-base-100 shadow-sm">
        <div class="hero-content flex-col gap-8 lg:flex-row-reverse lg:items-center lg:justify-between">
            <div class="max-w-md rounded-box bg-base-200 p-6 shadow-inner">
                <p class="mb-4 text-sm uppercase tracking-[0.25em] text-primary">At a glance</p>
                <div class="stats stats-vertical w-full shadow lg:stats-horizontal">
                    <div class="stat">
                        <div class="stat-title">Ideas Shared</div>
                        <div class="stat-value text-primary">100+</div>
                        <div class="stat-desc">From quick notes to big launches</div>
                    </div>
                    <div class="stat">
                        <div class="stat-title">Support</div>
                        <div class="stat-value">24/7</div>
                        <div class="stat-desc">Always ready for your next spark</div>
                    </div>
                </div>
            </div>

            <div class="max-w-2xl space-y-6">
                <div class="badge badge-primary badge-outline">Welcome to Laravel Journey</div>
                <h1 class="text-4xl font-bold tracking-tight md:text-6xl">The Idea Company.</h1>
                <p class="text-lg leading-8 text-base-content/75">
                    Bringing your most innovative thoughts to life. We specialize in gathering, organizing,
                    and developing ideas into reality. Start your journey with us today and let's build
                    something amazing together.
                </p>
                <div class="flex flex-wrap gap-3">
                    @auth
                        <a href="{{ url('/ideas') }}" class="btn btn-primary">View your ideas</a>
                        <a href="{{ url('/ideas/create') }}" class="btn btn-outline">Create an idea</a>
                    @else
                        <a href="{{ url('/register') }}" class="btn btn-primary">Get started</a>
                        <a href="{{ route('login') }}" class="btn btn-outline">Log in</a>
                    @endauth
                </div>
            </div>
        </div>
    </section>

    <section class="grid gap-6 md:grid-cols-3">
        <div class="card border border-base-300 bg-base-100 shadow-sm">
            <div class="card-body">
                <h2 class="card-title">Why share your ideas?</h2>
                <p>
                    Great things start from a simple thought. Our platform gives your ideas the space they
                    need to grow into apps, products, and services that matter.
                </p>
            </div>
        </div>

        <div class="card border border-base-300 bg-base-100 shadow-sm">
            <div class="card-body">
                <h2 class="card-title">Fast tracking</h2>
                <p>
                    We log your ideas instantly and keep them organized so you never lose a stroke of genius.
                </p>
            </div>
        </div>

        <div class="card border border-base-300 bg-base-100 shadow-sm">
            <div class="card-body">
                <h2 class="card-title">Community</h2>
                <p>
                    Join a network of creative thinkers and collaborate effortlessly on concepts.
                </p>
            </div>
        </div>
    </section>
</x-layout>
