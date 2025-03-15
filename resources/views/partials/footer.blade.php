<footer class="bg-light text-center py-2 mt-2" style="line-height: 1.2;">
    @if (session('username'))
        <p style="margin: 0;">You're logged in as: {{ session('username') }}</p>
    @endif
    <p style="margin: 0;">Team members: James, Dina, Vanessa La</p>
</footer>