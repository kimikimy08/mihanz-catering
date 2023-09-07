@extends('layouts.app')

@section('content')
    <div class="menu-Container">

        <div><h1>Menu Selection</h1></div>
        <ul class="menu-Card-Selection">
        @foreach ($menuItems as $key => $menuItem)
        <li id="Pork" style="background-image: linear-gradient(rgba(0,0,0,50%),rgba(0,0,0,50%)), url({{ $menuItem->menu_image }});">
            <a href="">{{ $menuItem->menu_category }}</a>
            </li>
            @endforeach
            
        </ul>

    </div>
    



<script>

export function Pork(){
    const [buttonPopup, setButtonPopup] = useState(false); 
        return(
        <>
        
    <div className="Food-Container">
    <div><button className="back-btn"><Link to="/menu"><IoMdArrowRoundBack/></Link></button></div>
        <h1>Pork Menu</h1>
        <li className="Food-Card-Menu" >
                <img src="/" alt=""onClick={() => setButtonPopup(true)} />
                <p className="Food-name">name</p>
                <Popup trigger={buttonPopup} setTrigger ={setButtonPopup}>
                    <h3>hello world</h3>
                </Popup>
            </li>
        <ul >
            
        </ul>
    </div>  
        </>
        );
    }

</script>
@endsection