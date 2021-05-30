<x-app-layout>
    <header class="mb-6 relative">
        <img 
            src="/images/default-banner.jpg" 
            alt=""
            class="border border-blue-400 rounded-lg w-full mb-2"
            style="height: 325px">

            <div class="flex justify-between items-center mb-2">
                <div>
                    <h2 class="font-bold text-2xl">{{$user->name}}</h2>
                    <p class="text-sm">Joined {{$user->created_at->diffForHumans()}}</p>
                </div>
                <div class="flex">
                    <a href="" class="rounded-full border border-gray-300 py-2 px-4 text-back text-xs mr-2">Edit profile</a>
                    <form method="POST" action="{{route('follow',$user->name)}}">
                        @csrf
                        <button 
                            type="submit" 
                            class="bg-blue-500 rounded-full shadow py-2 px-4 text-white text-xs"
                            >{{auth()->user()->isFollowing($user) ? 'unfollow' : 'Follow'}}
                        </button>
                    </form>
                </div>
            </div>
            <p class="text-sm"> Bio goes here</p>
            <img 
            src="{{$user->avatar}}"
            alt=""
            class="rounded-full border border-blue-300 mr-2 absolute"
            style="width:150px;left:calc(50% - 75px);top:54%">
            
    </header>

    @include('layouts._tweets-timeline',[
        'tweets'=>$user->tweets
        ])
</x-app-layout>
