<footer class="py-3 mt-4" style="background: linear-gradient(45deg, #dfbcc2, #f8e8ea); box-shadow: inset 0 2px 5px rgba(0,0,0,0.1);">
    <div class="container" style="max-width: 960px;">
        <div class="row align-items-center">
            @auth
                <div class="col-4">
                    <!-- Optional spacing -->
                </div>
                <div class="col-4 text-center">
                    <p class="mb-0" style="font-size: 0.9rem;"><strong>Team members: James, Dina, Vanessa La</strong></p>
                    <p class="mb-0" style="font-size: 0.8rem;">&copy; {{ date('Y') }} Sugar & Slice</p>
                </div>
                <div class="col-4 text-end">
                    <p class="mb-1" style="font-size: 1rem;">Signed in: {{ Auth::user()->username }}</p>
                </div>
            @else
                <div class="col-12 text-center">
                    <p class="mb-0" style="font-size: 0.9rem;"><strong>Team members: James Tolen, Zhaoqiu Ding, Vanessa La</strong></p>
                    <p class="mb-0" style="font-size: 0.8rem;">&copy; {{ date('Y') }} Sugar & Slice</p>
                </div>
            @endauth
        </div>
    </div>
</footer>