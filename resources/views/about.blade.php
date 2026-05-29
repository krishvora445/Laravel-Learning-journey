<x-layout title="About">
    <section class="hero rounded-box border border-base-300 bg-base-100 shadow-sm">
        <div class="hero-content flex-col gap-8 lg:flex-row lg:items-center lg:justify-between">
            <div class="max-w-2xl space-y-6">
                <div class="badge badge-secondary badge-outline">About Us</div>
                <h1 class="text-4xl font-bold tracking-tight md:text-6xl">Our Mission.</h1>
                <p class="text-lg leading-8 text-base-content/75">
                    At The Idea Company, we believe that innovation is the key to a better future. Our mission
                    is to foster a safe, creative, and highly productive environment where raw ideas can be
                    refined into groundbreaking solutions. We are designers, developers, and thinkers working
                    to empower your creativity.
                </p>
                <div class="flex flex-wrap gap-3">
                    <a href="{{ url('/register') }}" class="btn btn-primary">Join the journey</a>
                    <a href="{{ url('/ideas') }}" class="btn btn-outline">See the ideas</a>
                </div>
            </div>

            <div class="w-full max-w-md rounded-box bg-base-200 p-6 shadow-inner">
                <p class="mb-4 text-sm uppercase tracking-[0.25em] text-secondary">Company Values</p>
                <div class="grid gap-3 sm:grid-cols-2">
                    <div class="stat rounded-box bg-base-100 shadow">
                        <div class="stat-title">Vision</div>
                        <div class="stat-value text-secondary text-2xl">Think Big</div>
                    </div>
                    <div class="stat rounded-box bg-base-100 shadow">
                        <div class="stat-title">Integrity</div>
                        <div class="stat-value text-2xl">Be Honest</div>
                    </div>
                    <div class="stat rounded-box bg-base-100 shadow">
                        <div class="stat-title">Drive</div>
                        <div class="stat-value text-2xl">Stay Hungry</div>
                    </div>
                    <div class="stat rounded-box bg-base-100 shadow">
                        <div class="stat-title">Focus</div>
                        <div class="stat-value text-2xl">Execute</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="grid gap-6 lg:grid-cols-3">
        <div class="card border border-base-300 bg-base-100 shadow-sm lg:col-span-2">
            <div class="card-body">
                <h2 class="card-title text-2xl">The Company Story</h2>
                <p class="leading-7 text-base-content/75">
                    Started in 2026, The Idea Company was born out of a simple frustration: too many great ideas
                    are forgotten because there was no proper place to store and nurture them. We built this
                    platform as a hub for thinkers and innovators.
                </p>
            </div>
        </div>

        <div class="card border border-base-300 bg-base-100 shadow-sm">
            <div class="card-body">
                <h2 class="card-title">Our Team</h2>
                <p class="leading-7 text-base-content/75">
                    We are a small, dedicated team of software artisans committed to bringing elegant, reliable
                    tools to the community.
                </p>
            </div>
        </div>

        <div class="card border border-base-300 bg-base-100 shadow-sm lg:col-span-3">
            <div class="card-body md:flex md:items-center md:justify-between">
                <div class="space-y-2">
                    <h2 class="card-title text-2xl">Looking Ahead</h2>
                    <p class="leading-7 text-base-content/75">
                        Our journey is just beginning. We plan to expand our toolkit with AI-driven insights to help
                        prioritize your best thoughts.
                    </p>
                </div>
                <a href="{{ url('/ideas/create') }}" class="btn btn-secondary mt-4 md:mt-0">Share your next idea</a>
            </div>
        </div>
    </section>
</x-layout>
