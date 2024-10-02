<x-app-layout>
    <div>
        <main>
            <section>
                <div>
                    <div>
                        <div>
                            <h3>Create Post</h3>
                        </div>
                        <div>
                            <form action="{{ route('store-post') }}" method="POST">
                                @csrf
                                <!-- Question -->
                                <div>
                                    <label for="question">Title</label>
                                    <input type="text" id="title" name="title" value="{{ old('title') }}">
                                    @error('title')
                                    <div>{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Answer -->
                                <div>
                                    <label for="answer">Post Content</label>
                                    <textarea id="content" name="content">{{ old('content') }}</textarea>
                                    @error('content')
                                    <div>{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Submit Button -->
                                <button type="submit">Add Post</button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
</x-app-layout>