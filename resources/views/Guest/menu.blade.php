@extends('layouts.app')

@section('content')
    <div class="menu-Container">

        <div><h1>Menu Selection</h1></div>
        <ul class="menu-Card-Selection">
        <li id="Pork">
                <a href="./menuPages/porkMenu.html">Pork</a>
            </li>
            <li id="Beef">
                <a href="./menuPages/beefMenu.html">Beef</a>
            </li>
            <li id="Chicken">
                <a href="./menuPages/chickenMenu.html">Chicken</a>
            </li>
            <li id="Fish">
                <a href="./menuPages/fishMenu.html">Fish</a>
            </li>
            <li id="Seafood">
                <a href="./menuPages/seaFoodMenu.html">SeaFood</a>
            </li>
            <li id="Pasta">
                <a href="./menuPages/pastaMenu.html">Pasta</a>
            </li>
            <li id="Vegetables">
                <a href="./menuPages/vegetablesMenu.html">Vegetables</a>
            </li>
            <li id="Desserts">
                <a href="./menuPages/dessertsMenu.html">Desserts</a>
            </li>
            <li id="Drinks">
                <a href="./menuPages/drinksMenu.html">Drinks</a>
            </li>
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