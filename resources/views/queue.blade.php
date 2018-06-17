@extends('layouts.app')

@section('content')

        <head>
            <link href={{ asset('css/queue_form.css') }} rel="stylesheet">
            <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.1.1.min.js"></script>
   
            <script>
                $(function() {
                    $("div[id*='menu-']").hide(); 
                })();                        
                    function toggle(objName) {

                        var obj = $(objName),
                        blocks = $("div[id*='menu-']");
                            
                        if (obj.css("display") != "none") {
                                obj.animate({ height: 'hide' }, 500);
                        } else {
                            var visibleBlocks = $("div[id*='menu-']:visible");
                                
                            if (visibleBlocks.length < 1) {                        
                                obj.animate({ height: 'show' }, 500);
                            } else {
                                $(visibleBlocks).animate({ height: 'hide' }, 500, function() {
                                    obj.animate({ height: 'show' }, 500);
                                }); 
                            }
                        }
                    }
            </script>
        </head>

        <main class="py-4 bg-light">            
            <div class="container center-block">
                <div class="col-md-10 order-md-1">

                    <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-purple rounded box-shadow mb-3">
                        <div  class="lh-100">
                            <h4 class="mb-0 text-white lh-100">Бронирование</h4>
                            <small>Аудитория 1/268a</small>
                        </div>
                    </div> 

                    {{-- {{ route('reserveCab') }} --}}
                    
                    <form class="needs-validation form-group my-3 p-3 bg-white rounded box-shadow" method="POST" action="/reserveCab"> 
                    {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                
                                <label for="firstName">Имя</label>
                                <input type="text" class="form-control" name="firstName" placeholder="Имя" value="" required>
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">                                
                                <label for="lastName">Фамилия</label>
                                <input type="text" class="form-control" name="lastName" placeholder="Фамилия" value="" required>
                                <div class="invalid-feedback">
                                    Valid last name is required.
                                </div>
                            </div>   
                            <div class="col-md-6 mb-3">                                
                                <label for="libCardNumber">Номер чит. билета</label>
                                <input type="number" class="form-control" name="libCardNumber" placeholder="Читательский билет" value="" min="1" max="99999999"  minlength="1" maxlength="6" required>
                                <div class="invalid-feedback">
                                    Valid Card Number is required.
                                </div>
                            </div>                            
                            <div class="form-group col-md-6 mb-3">
                                <label for="resDateTime">Введите дату и время:</label> 
                                <input type="datetime-local" class="form-control" name="resDateBegin" placeholder="Дата бронирования" required>
                                <div class="invalid-feedback">
                                    Valid Reservation Date Time is required.
                                </div>
                            </div>
                            <div class="form-group col-md-6 mb-3">
                                <label for="duration">Длительность</label> 
                                <input type="number" class="form-control" name="duration" placeholder="Количество часов" min="1" max="3" required>
                                <div class="invalid-feedback">
                                    Valid Reservation Time is required.
                                </div>
                            </div> 
                            <div class="form-group col-md-6 mb-3">
                                <label for="duration">Количество занимаемых мест</label> 
                                <input type="number" class="form-control" name="seatsQuantity" placeholder="Количество занимаемых мест" min="1" max="8" required>
                                <div class="invalid-feedback">
                                    Valid Reservation Time is required.
                                </div>
                            </div>                          

                        </div>
                        <button type="submit" name="submit" value="Add" class="btn btn-success">Бронировать</button>
                    </form>

                    <div class="form-group my-3 p-3 bg-white rounded box-shadow" >
                        <div class="container">
                            <div class="row">
                                <div>                        
                                    <button type="button" onclick="toggle('#menu-2');" class="btn btn-default bg-purple text-white"><i class="far fa-question-circle fa-lg" style="solid"></i></button>
                                        
                                    <div id="menu-2">
                                        <div class="mb-3 col-md-12 mt-3">                                            
                                            <ul>
                                                <li>Для бронирования аудитории Вам необходимо заполнить все поля указанные в форме "Бронирование".</li>                                            
                                                <li>Вместимость аудитории до 8 человек, также ограничение по времени на бронь установливается до 3х часов.</li>                                         
                                                <li>Если вы не явитесь в указанное время, бронь будет отменена.</li>                    
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>                        
                    </div>

                </div> {{-- col-md-10 order-md-1 --}}
            </div> {{-- container center-block --}}

        </main>
@endsection