<div>
    <!-- I begin to speak only when I am certain what I will say is not better left unsaid. - Cato the Younger -->
    {{-- <p>{{ $book->title }}</p>
    <p>{{ $book->description }}</p>
    <p>{{ \Carbon\Carbon::parse($book->created_at)->diffForHumans() }}</p> --}}
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

<style>
    @import url('https://fonts.googleapis.com/css2?family=Jost:wght@300;400&display=swap');
    .card-footer {
        margin-left: 25px;
        position: absolute;
        width: 250px;
        height: 60px;
        filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.25));
        background: linear-gradient(180deg, #D98B60 13.02%, #D5395E 94.27%);
        border-radius: 4px 4px 20px 20px;
    }
    p {
        margin-top: 2px;
        font-family: 'Jost';
        font-style: normal;
        font-weight: 600;
        font-size: 15px;
        text-align: center;
        color: #FFFFFF;
    }
    .line {
        width: 0;
        border: 1px solid #797373;
        opacity: 0.5;
    }
    .grid-container {
        display: grid;
        grid-template-columns: auto auto auto;
    }
</style>