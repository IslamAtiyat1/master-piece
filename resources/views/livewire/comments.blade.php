<div class="flex justify-center">
    <div class="w-9/12 comment-box">
        <form class="my-4 flex" wire:submit.prevent="addComment">
            <input type="text" class="w-full rounded border shadow p-2 mx-2 my-2" placeholder="What's on your mind."
                wire:model.lazy="newcomment">
            <input type="hidden" name="product_id" value="{{ $productId }}">
            <div class="py-2">
                <button type="submit" class="p-2  w-20 rounded bg-primary" id="product_btn">Add</button>
            </div>
        </form>
        @foreach ($comments as $comment)
            <div class="rounded border shadow p-3 my-4 d-flex items-center">
                <div class="mr-2">
                    <span class="round">
                        <img src="{{ asset('images/tim.png') }}" alt="user" width="50" class="rounded-full">
                    </span>
                </div>
                <div>
                    <div class="flex items-center">
                        <b class="text-lg">{{ $comment->creator->name }}</b>
                        <p class="text-sm text-gray-500 ml-2">{{ $comment->created_at->diffForHumans() }}</p>
                    </div>
                    <p class="text-sm">{{ $comment->body }}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>
