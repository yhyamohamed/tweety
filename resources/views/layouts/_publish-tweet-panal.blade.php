<div class="border border-blue-400 rounded-lg px-8 py-6 mb-8">
    <form method="POST" action="{{route('add_tweet')}}">
        @csrf
        <textarea 
            name="body" +
            class="w-full"
            placeholder="Wts on your mind!"
            style="border: none"></textarea>
        <hr class="my-4">
        <footer class="flex justify-between">
            <img 
            src="{{auth()->user()->avatar}}" 
            alt=""
            class="rounded-full mr-2"
            width="50"
            height="50">
            <button type="submit" class="bg-blue-500 rounded-lg shadow py-2 px-2 text-white">Tweet</button>
        </footer>
    </form>
    @if ($errors->any())
        <div class="text-red-600 text-sm mt-2">
            <ul>
                @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>