<div id="card">
    <div>
        <div>
            <img src={{ asset('storage/madalyn-cox-O7ygzpAL4Mc-unsplash.jpg') }} class="card-header">
        </div>
        <div class="card-body">
            <p class="difference">{{ \Carbon\Carbon::parse($book->created_at)->diffForHumans() }}</p>
            <div>
                <p class="title">{{ $book->title }}</p>
            </div>
            <div>
                <p class="description">
                    {{ $book->description }}
                </p>
            </div>
        </div>
    </div>
    <div class="grid-container card-footer">
        <div class="grid-container">
            <p>24K downloads</p>
            <div class="line"></div>
        </div>
        <div class="grid-container">
            <p>55 Pages</p>
            <div class="line"></div>
        </div>
        <p>William Shakespeare</p>
    </div>
</div>