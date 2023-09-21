
@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{ asset('css/packages.css') }}">


<div class="Customization-form">
        <h1 id="title">Reservation Form</h1>
        
        <div class="form-information">
            <h1 class="Form-title">
                PLEASE READ FIRST
            </h1>

            <p>
                Reservation Package for <b>50</b> Guest
                The Package you chose already includes the following:
            </p>
            <ul>
                <li>Chicken</li>
                <li>Vegetable</li>
                <li>Pasta/Pansit</li>
                <li>Dessert</li>
                <li>Drinks</li>
                <li>Complete setup of buffet</li>
                <li>Basic setup of backdrop</li>
                <li>Gift Table</li>
                <li>Cake Table</li>
                <li>Skirting</li>
                <li>Chairs & Tables with cover</li>
                <li>Waiter & Food attendant</li>
                <li>Utensils</li>
                
            </ul>

        </div>
       
    



        <form method="POST" action="{{ route('user.premade.store', ['serviceCategory' => $categoryName, 'servicePromo' => $promo]) }}" enctype="multipart/form-data">
        @csrf
            <table class="table-Information">
                <tr>
                    <td>Celebrant Name:</td>
                    <td><input type="text" name="celebrant_name" id="celebrant_name" placeholder="Name"></td>
                </tr>
                <tr>
                    <td>Event Location:</td>
                    <td><input type="text" name="event_location" id="event_location" placeholder="Address"></td>
                </tr>
                <tr>
                    <td>Celebrant Age:</td>
                    <td><input type="number" name="celebrant_age" id="celebrant_age" placeholder="Age"></td>
                </tr>
                <tr>
                    <td>Theme:</td>
                    <td><input type="text" name="celebrant_theme" id="celebrant_theme" placeholder="Theme"></td>
                </tr>
                <tr>
                    <td>Celebrant Gender:</td>
                    <td><input type="text" name="celebrant_gender" id="celebrant_gender" placeholder="Gender"></td>
                </tr>
                <tr>
                    <td>Date:</td>
                    <td><input type="date" name="event_date" id="event_date" ></td>
                </tr>
                <tr>
                    <td>Time Start:</td>
                    <td><input type="time" name="start_time" id="start_time" ></td>
                </tr>

                <tr>
                    <td>Time End:</td>
                    <td><input type="time" name="end_time" id="end_time" ></td>
                </tr>
                
                
            </table>                            

    </div>
    <main class="optionForm">
        <table >
            <tr>
                <td></td>
            <td style="text-align:center">Menu Category</td>
           <td style="text-align:center">Menu</td> </tr>
        <tr>
                <td>Pork/Beef:</td>
                <td>
                   
                    <select name="menu_category" id="menu_category">
                        <option value="" selected disabled>Please choose</option>
                        <option value="beef">Beef</option>
                        <option value="pork">Pork</option>
                    </select>
                </td>
                <td>
                
                    <select name="menu_id" id="menu_id">
                        <option value="" selected disabled>Please choose </option>
                    </select>
                </td>
                
            </tr>
            <tr>
                <td>Chicken/Fish/Seafood:</td>
                <td>
        
                    <select name="menu_category_cfs" id="menu_category_cfs">
                        <option value="" selected disabled>Please choose</option>
                        <option value="chicken">Chicken</option>
                        <option value="fish">Fish</option>
                        <option value="seafood">Seafood</option>
                    </select>
                </td>
                <td>
            
                    <select name="menu_id_cfs" id="menu_id_cfs">
                        <option value="" selected disabled>Please choose </option>
                    </select>
                </td>
                
            </tr>
            <tr>
                <td>Vegetable:</td>
                <td></td>
                <td>
                <Select name="menu_id_veg" id="menu_id_veg">
                <option value="" selected disabled>Please choose</option>
                @foreach($vegetables as $vegetable)
                
                    <option value="{{ $vegetable->id }}">{{ $vegetable->name }} - ₱{{ $vegetable->price }}</option>
                @endforeach
</Select>
            </td>
            </tr>
            <tr>
                <td>Pasta/Pansit:</td>
                <td></td>
                <td>
                <Select name="menu_id_pasta" id="menu_id_pasta">
                <option value="" selected disabled>Please choose</option>
                @foreach($pastas as $pasta)
                
                    <option value="{{ $pasta->id }}">{{ $pasta->name }} - ₱{{ $pasta->price }}</option>
                @endforeach
</Select>
            </td>
            </tr>
            <tr>
                <td>Desserts:</td>
                <td></td>
                <td>
                <Select name="menu_id_dessert" id="menu_id_dessert">
                <option value="" selected disabled>Please choose</option>
                @foreach($desserts as $dessert)
                
                    <option value="{{ $dessert->id }}">{{ $dessert->name }} - ₱{{ $dessert->price }}</option>
                @endforeach
</Select>
            </td>
            </tr>
            <tr>
                <td>Drinks:</td>
                <td></td>
                <td>
                    
                <select name="menu_id_drink" id="menu_id_drink">
                <option value="" selected disabled>Please choose</option>
                @foreach($drinks as $drink)
                
                    <option value="{{ $drink->id }}">{{ $drink->name }} - ₱{{ $drink->price }}</option>
                @endforeach
            </select>
            </td>
            </tr>
        </table>

        <div class="btn-FoodCustom">
        <div>
                <h1>Terms and Condition</h1>
                <section>
                    <h1>1.Reservation.</h1>
                    <p> Non-refundable reservation fee of 1000php is required to block your desired date. Must be made personally by the CLIENT or any authorized person. Endorsement letter may also be honored in behalf of the CLIENT <i> Ang non-refundable reservation fee na 1000php ay kinakailangan para ma-block ang iyong gustong petsa. Dapat gawin ng personal ng CLIENT o sinumang awtorisadong tao. Ang liham ng pag-endorso ay maaari ding parangalan sa ngalan ng CLIENT.</i></p>
                    <h1>2.TERMS OF PAYMENT.</h1>
                    <p>The client is required to settle fifty percent (50%) of the total contract cost 3 weeks before the event. CLIENT should pay cash, bank deposit or bank transfer. To : bank details and account number.<i>Kinakailangang bayaran ng kliyente ang limampung porsyento (50%) ng kabuuang halaga ng kontrata 3 linggo bago ang kaganapan. Ang CLIENT ay dapat magbayad ng cash, bank deposit o bank transfer. Para sa : mga detalye ng bangko at account number.</i></p>
                        <ol type="a">
                            <li>
                                <p>Full payment must be paid on or right after the event. CLIENT should only pay in cash (for any balance and additionals made). CLIENTS who wish to pay full amount are highly encouraged to avoid hassles during and after the event.<i> Dapat bayaran ang buong bayad sa mismong araw o pagkatapos ng kaganapan. Ang CLIENT ay dapat magbayad lamang ng cash (para sa anumang balanse at mga karagdagang ginawa). Lubos na hinihikayat ang mga kliyente na gustong magbayad ng buong halaga na upang maiwasan ang mga abala sa panahon at pagkatapos ng kaganapan
                                </i></p>
                            </li>
                        </ol>
                    <h1>3.ACTUAL CATERING.</h1>
                    <p>Inclusive of 4 hours service time. Mihanz Catering reserves the right to charge an extra amount equivalent to 10% per hour of extension of the contracted amount if the agreed end time of service is exceeded unreasonably. CLIENT will be billed for additional staff hours (100php/staff/hr) for any time extension beyond the prior agreed time.<i>Sakop ang 4 na oras na serbisyo. Inilalaan ng Mihanz Catering ang karapatang maningil ng dagdag na halaga na katumbas ng 10% kada oras ng pagpapalawig ng kinontratang halaga kung ang napagkasunduang oras ng pagtatapos ng serbisyo ay lumampas nang hindi makatwiran. Sisingilin ang CLIENT para sa karagdagang oras ng staff (100php/staff/hr) para sa anumang pagpapalawig ng oras na lampas sa naunang napagkasunduan na oras.</i></p>
                    <h1>4.GUEST COUNT.</h1>
                    <p> Final guest count, not subject to reduction, is due five (5) days before the event. Any additional guest after the stated period is subject to extra charges as may be imposed by Mihanz Catering. </p>
                        <ol type="a">
                            <li>
                                <p> Should there be any changes to the number of guests specified in the CLIENTS original booking; the CLIENT shall notify Mihanz in advance thru the following: phone call or in person. <i>Ang panghuling bilang ng bisita, hindi napapailalim sa pagbabawas, ay dapat bayaran limang (5) araw bago ang kaganapan. Ang sinumang karagdagang bisita pagkatapos ng nakasaad na panahon ay napapailalim sa mga dagdag na singil na maaaring ipataw ng Mihanz Catering. Kung mayroong anumang mga pagbabago sa bilang ng mga bisita na tinukoy sa orihinal na booking ng CLIENTS; aabisuhan ng CLIENT si Mihanz nang maaga sa pamamagitan ng sumusunod: tawag sa telepono o nang personal.</i></p>
                            </li>
                            <li>
                                <p>Should the CLIENT failed to disclose to notify Mihanz with additional number of guests, Mihanz is not to be held liable for the insufficiency of food and any complaint that might occur. <i>Kung nabigo ang CLIENT na ipaalam kay Mihanz ang karagdagang bilang ng mga bisita, hindi mananagot si Mihanz para sa kakulangan ng pagkain at anumang reklamo na maaaring mangyari.</i></p>
                            </li>
                        </ol>
                        <h1>5.RENTALS.</h1>
                        <p>Mihanz Catering may provide all or part the rental items for the event. However, certain items may incur restocking & cancellation fees. If Mihanz Catering arranges rentals, for the CLIENT, through a rental company, CLIENT will have to pay the rental company directly. Any loss or damage to any rentals will be billed to CLIENT after the event.<i> Maaaring ibigay ng Mihanz Catering ang lahat o bahagi ng mga paupahang bagay para sa kaganapan. Gayunpaman, maaaring magkaroon ng mga bayarin sa pag-restock at pagkansela ang ilang partikular na item. Kung ang Mihanz Catering ay nag-aayos ng mga rental, para sa CLIENT, sa pamamagitan ng isang kumpanya ng pag-upa, ang CLIENT ay kailangang magbayad nang direkta sa kumpanya ng pag-upa. Ang anumang pagkawala o pinsala sa anumang mga rental ay sisingilin sa CLIENT pagkatapos ng kaganapan.</i></p>
                        <ol type="A">
                            <li>
                                <p>We encourage CLIENT to make sure that all equipment used will be packed and returned after the event. Any MIHANANZ property that will be left at the venue is a CLIENT'S responsibility. Should MIHANZ need to arrange pickup for any left equipment, it is in expense of the CLIENT or additional bill will be made. Any loss or damage will be charged to the CLIENT. <i> Hinihikayat namin ang CLIENT na tiyakin na ang lahat ng kagamitang ginamit ay maiimpake at ibabalik pagkatapos ng kaganapan. Ang anumang property ng MIHANANZ na maiiwan sa venue ay responsibilidad ng CLIENT. Kung kailangang ayusin ng MIHANZ ang pickup para sa anumang natitirang kagamitan, ito ay nasa gastos ng CLIENT o karagdagang singil ay gagawin. Ang anumang pagkawala o pinsala ay sisingilin sa CLIENT.</i></p>
                            </li>
                        </ol>
                        <h1>6.OTHER CHARGES.</h1>
                        <p> Corkage, bond and other fees required by venues and other 3rd party suppliers are charged to client.<i>Ang corkage, bond at iba pang mga bayarin na kinakailangan ng mga venue at iba pang 3rd party na supplier ay sinisingil sa kliyente.</i></p>
                        <ol type="A">
                            <li>
                                <p>Any <b>MIHANZ</b> equipment left at the venue should be returned the next day or else it will be subject to additional fee of ____ per day. Any loss or damage to MIHANZ’s property will be billed accordingly<i> Ang anumang kagamitan ng MIHANZ na naiwan sa venue ay dapat ibalik sa susunod na araw o kung hindi, ito ay sasailalim sa karagdagang bayad na ____ bawat araw. Ang anumang pagkawala o pinsala sa ari-arian ng MIHANZ ay sisingilin nang naaayon.</i></p>
                            </li>
                            <li>
                                <p><b>LEFTOVERS.</b>  All leftovers will be given to the CLIENT or authorized representative available at the time of turnover.<i>Lahat ng natirang pagkain ay ibibigay sa CLIENT o awtorisadong kinatawan na available sa oras ng turnover.</i></p>
                            </li>
                            <li>
                                <p> <b> GIFTS.</b>   CLIENT shall oversee all gifts and other personal belongings at all times.In the event of loss and/or damage,MIHANZ shall not be held liable. <i> Pangasiwaan ng CLIENT ang lahat ng regalo at iba pang personal na pag-aari sa lahat ng oras. Kung sakaling mawala at/o masira, hindi mananagot si Mihanz.</i></p>
                            </li>
                            <li>
                                <p><b>CANCELLATION BY: CLIENT / VENUE / ACTS OF GOD</b></p>
                                <p>All prepayments and deposits are returned in full, if the event is cancelled by CLIENT, the venue or by an act of God, 30 days or more, from the event date. <i>Ang lahat ng mga prepayment at deposito ay ibinabalik nang buo, kung ang kaganapan ay kinansela ng CLIENT, ang lugar o sa pamamagitan ng pagkilos ng Diyos, 30 araw o higit pa, mula sa petsa ng kaganapan.</i></p>
                                <ol type="a">
                                    <li>
                                        <p>If the event is canceled, fifteen (15) days or more from the event date, all prepayments and deposits are returned to CLIENT in full (less Fifty percent (50%) of the prepayment or deposit amount.)<i>Kung kinansela ang kaganapan, labinlimang (15) araw o higit pa mula sa petsa ng kaganapan, lahat ng prepayment at deposito ay ibabalik sa CLIENT nang buo (mas mababa sa Limampung porsyento (50%) ng halaga ng prepayment o deposito.)</i></p>
                                    </li>
                                    <li>
                                        <p>If the event is canceled, less than fifteen (15) days of the event date, all deposits and prepayments are not refundable.<i> Kung kinansela ang kaganapan, wala pang labinlimang (15) araw ng petsa ng kaganapan, ang lahat ng mga deposito at prepayment ay hindi maibabalik.</i></p>
                                    </li>
                                    <li>
                                        <p>If CATERER is able to re-book the date with a similar event, all prepayments and deposits are returned in full (less Php_________ service fee).<i>Kung ang CATERER ay makakapag-book muli ng petsa na may katulad na kaganapan, ang lahat ng mga prepayment at deposito ay ibinabalik nang buo (mas mababa ang Php_________ na bayad sa serbisyo).</i></p>
                                    </li>
                                </ol>
                            </li>
                            <li>
                                <p> <b>CANCELLATION BY CATERER.</b>  CATERER reserves the right to terminate this contract for any valid reason.<i> Inilalaan ng CATERER ang karapatang wakasan ang kontratang ito para sa anumang wastong dahilan.</i></p>
                                <ol type="a">
                                    <li>
                                        <p>IF Mihanz Catering terminates this contract before thirty (30) day period prior to the event date, all deposits and prepayments will be returned in full within ten (10) days.<i> Kung wakasan ng Mihanz Catering ang kontratang ito bago ang tatlumpung (30) araw bago ang petsa ng kaganapan, lahat ng deposito at prepayment ay ibabalik nang buo sa loob ng sampung (10) araw.</i></p>
                                    </li>
                                    <li>
                                        <p>IF Mihanz Catering terminates this contract within the thirty (30) day period prior to the event date, all deposits and prepayments will be returned in full within ten (10) days as well as an additional PHP____________ as penalty.<i> KUNG tatapusin ng Mihanz Catering ang kontratang ito sa loob ng tatlumpung (30) araw bago ang petsa ng kaganapan, lahat ng deposito at prepayment ay ibabalik nang buo sa loob ng sampung (10) araw pati na rin ang karagdagang PHP____________ bilang multa.</i></p>
                                    </li>
                                </ol>
                            </li>
                            <li>
                                <p> <b>CHANGES. </b> This contract may not be modified orally. Any changes must be in writing and signed by all parties.<i>Ang kontratang ito ay hindi maaaring baguhin nang pasalita. Ang anumang mga pagbabago ay dapat nakasulat at nilagdaan ng lahat ng partido.</i></p>
                            </li>
                        </ol>

                </section>
                <select id="terms_and_conditions" name="terms_and_conditions">
    <option value="" selected disabled>Please choose</option>
    <option value="accept">Accept</option>
    <option value="decline">Decline</option>
</select>
    <br>
                <button type="submit">Proceed</button>
                
        </div>
         
              
            </div>
       
    </main>

    </form>  

   

    <script>
        
      
        const menuCategorySelect = document.getElementById('menu_category');
        const menuSelect = document.getElementById('menu_id');

        menuCategorySelect.addEventListener('change', () => {
            const selectedCategory = menuCategorySelect.value;
            menuSelect.innerHTML = ''; // Clear previous options

            switch (selectedCategory) {
                case 'beef':
                    populateMenus(@json($beefMenus));
                    break;
                case 'pork':
                    populateMenus(@json($porkMenus));
                    break;
                default:
                    menuSelect.innerHTML = '<option value="" selected disabled>Please choose a menu category first</option>';
            }
        });

        function populateMenus(menus) {
            menus.forEach(menu => {
                menuSelect.innerHTML += `<option value="${menu.id}">${menu.name} - ₱${menu.price}</option>`;
            });
        }

        const menuCategorySelect_cfs = document.getElementById('menu_category_cfs');
        const menuSelect_cfs = document.getElementById('menu_id_cfs');

        menuCategorySelect_cfs.addEventListener('change', () => {
            const selectedCategory_cfs = menuCategorySelect_cfs.value;
            menuSelect_cfs.innerHTML = ''; // Clear previous options

            switch (selectedCategory_cfs) {
                case 'chicken':
                    populateMenus_cfs(@json($chickenMenus));
                    break;
                case 'fish':
                    populateMenus_cfs(@json($fishMenus));
                    break;
                case 'seafood':
                    populateMenus_cfs(@json($seafoodMenus));
                    break;
                default:
                    menuSelect_cfs.innerHTML = '<option value="" selected disabled>Please choose a menu category first</option>';
            }
        });

        function populateMenus_cfs(menus_cfs) {
            menus_cfs.forEach(menu_cfs => {
                menuSelect_cfs.innerHTML += `<option value="${menu_cfs.id}">${menu_cfs.name} - ₱${menu_cfs.price}</option>`;
            });
        }
    </script>


@endsection