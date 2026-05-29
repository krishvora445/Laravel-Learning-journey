<x-layout title="Register">
    <section class="mx-auto max-w-md">
        <div class="card border border-base-300 bg-base-100 shadow-lg">
            <div class="card-body">
                <div class="space-y-2 text-center">
                    <p class="text-sm uppercase tracking-[0.25em] text-secondary">Get started</p>
                    <h1 class="text-3xl font-bold">Register</h1>
                    <p class="text-base-content/75">Create your account to save and organize ideas.</p>
                </div>

                <form action="{{ url('/register') }}" method="post" class="space-y-4">
                    @csrf

                    <label class="form-control w-full">
                        <div class="label"><span class="label-text font-medium">Name</span></div>
                        <input class="input input-bordered w-full" name="name" placeholder="Your Name" required />
                        <x-forms.error name="name" />
                    </label>

                    <label class="form-control w-full">
                        <div class="label"><span class="label-text font-medium">Email</span></div>
                        <input type="email" name="email" class="input input-bordered w-full" placeholder="Email" required />
                        <x-forms.error name="email" />
                    </label>

                    <label class="form-control w-full">
                        <div class="label"><span class="label-text font-medium">Password</span></div>
                        <input type="password" name="password" class="input input-bordered w-full" placeholder="Password" required />
                        <x-forms.error name="password" />
                    </label>

                    <button class="btn btn-primary w-full mt-4" data-test="register-button" type="submit">Register</button>
                </form>

                <div class="divider">or</div>

                <p class="text-center text-sm text-base-content/75">
                    Already have an account?
                    <a href="{{ route('login') }}" class="link link-primary">Log in</a>
                </p>
            </div>
        </div>
    </section>
</x-layout>
