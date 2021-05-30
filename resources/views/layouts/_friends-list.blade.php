<div class="bg-blue-100 rounded-lg py-4 px-6">
    <h3 class="font-bold text-xl mb-4">Following</h3>
    <ul>
        @foreach(auth()->user()->follows as $follows)
            <li class="mb-4">
                <div>
                    <a href="{{route('profile',$follows)}}"class="flex items-center text-sm">
                        <img 
                        src="{{$follows->avatar}}" 
                        alt=""
                        class="rounded-full mr-2"
                        width="40"
                        height="40">
                        {{$follows->name}}
                    </a>
                </div>
            </li>  
        @endforeach
    </ul>
</div>