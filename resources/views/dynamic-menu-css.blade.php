<style>
    @foreach($menuItems as $index => $menuItem)
        .menu-Card-Selection li:nth-child({{ $index + 1 }}) {
            background-image: linear-gradient(rgba(0,0,0,50%),rgba(0,0,0,50%)),url({{ $menuItem['image_url'] }});
            background-size: cover;
            background-position: center;
        }
    @endforeach


    .menu-Card-Selection a:hover {
        font-size: 60px;
        background: linear-gradient(rgba(0,0,0,50%),rgba(0,0,0,50%));
        border-radius: 10px;
    }
</style>