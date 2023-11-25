<x-app-layout>

    <div class="container mt-5">
        <h2>Create Post</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" id="content" rows="4" class="form-control" required></textarea>
            </div>

            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" class="form-control-file">
            </div>
            <div class="form-group">
                <label for="tags">Tags</label>
                <div class="tags-container">
                    <div id="tags" class="tags">
                        <!-- Existing tags -->
                    </div>
                    <div class="search-container">
                        <input type="text" id="tag-input" placeholder="Search tags" class="search-input">
                        <button id="add-button" class="add-button">Add</button>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var addButton = document.getElementById('add-button');
            var selectedTags = [];

            addButton.addEventListener('click', function(event) {
                event.preventDefault(); // Prevent form submission

                var tagInput = document.getElementById('tag-input');
                var tagValue = tagInput.value.trim();

                if (tagValue !== '') {
                    var tagsContainer = document.getElementById('tags');
                    var tagElement = document.createElement('div');
                    tagElement.classList.add('tag', 'added-tag');
                    tagElement.innerHTML = '<input type="hidden" name="tags[]" value="' + tagValue + '" >' +
                        '<span class="tag-label" >' + tagValue + '</span>' +
                        '<span class="remove-button">&times;</span>';

                    tagsContainer.appendChild(tagElement);
                    tagInput.value = '';

                    selectedTags.push(tagValue); // Add the tag to the selected tags array
                    // Update the hidden input field value
                }
            });

            document.addEventListener('click', function(event) {
                if (event.target.classList.contains('remove-button')) {
                    var tagLabel = event.target.previousElementSibling.textContent;
                    event.target.parentElement.remove();

                    var index = selectedTags.indexOf(tagLabel);
                    if (index > -1) {
                        selectedTags.splice(index, 1); // Remove the tag from the selected tags array
                        // Update the hidden input field value
                    }
                }
            });


        });
    </script>
</x-app-layout>
