<x-app-layout>

    <div class="row d-flex justify-content-center mt-100 mb-100">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body text-center">
                    <h4 class="card-title">Latest Comments</h4>
                </div>
                <div class="comment-widgets">
                    <x-comments :comments="$comments" />

                </div>
            </div>
        </div>
</x-app-layout>
