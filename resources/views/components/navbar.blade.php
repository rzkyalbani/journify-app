<nav class="flex justify-between bg-blue-700 text-white text-lg px-8 py-4">
  <h3 class="text-2xl font-medium">
    <a href="/" class="hover:text-gray-300">Journify</a>
  </h3>
  <div class="flex gap-8 text-zinc-300">
    <a href="/">Home</a>
    <a href="/">My Posts</a>
    <a href="/">Profile</a>
    <form action="/logout" method="POST" class="ml-8">
      @csrf
      <button type="submit" class="text-white">Logout</button>
    </form>
  </div>
</nav>