@extends('layouts.master')

@section('style')
@endsection
@section('content')
    <div class="container" style="margin-top: 50px">
        <div class="row">
            <div class="col-4">
                <div class="card bg-light">
                    <div class="card-header text-center">
                        <h4>Question ?<i class="far fa-user" style="margin-left: 10px"></i></h4>
                    </div>
                    <div class="card-body">
                        <form action="" method="post" style="padding-bottom: 1.5rem;"></form>
                        <div style="padding-bottom: 1.5rem;">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="">
                        </div>
                        <div style="padding-bottom: 1.5rem;">
                            <label for="detail">Detail</label>
                            <textarea name="detail" id="" cols="30" rows="10"></textarea>
                        </div>
                        <div style="padding-bottom: 1.5rem;">
                            <label for="choose your pet">Choose your pet </label>
                            <select name="number">
                                <option text="0">dog</option>
                                <option value="1">cat</option>
                                <option value="2" selected="selected">giraffe</option>
                            </select>

                        </div>
                        <div style="padding-bottom: 1.5rem;">
                            <label for="choose your pet">Choose Doctor </label>
                            <select name="number">
                                <option text="0">Dr. A</option>
                                <option value="1">Dr. B</option>
                                <option value="2" selected="selected">Dr. C</option>
                            </select>

                        </div>
                        <h3>Pet Symptom</h3>
                        <div style="padding-bottom: 1.5rem;">
                            <div>Does your pet Vomiting and Diarrhoea?</div>
                            <div style="text-align: center;">

                                <input type="checkbox" value="1" checked id="yes" name="yes">
                                <label for="yes">Yes</label>
                                <input type="checkbox" value="1" checked id="No" name="No">
                                <label for="No">No</label>
                            </div>


                        </div>
                        <div style="padding-bottom: 1.5rem;">
                            <div>Does your pet Vomiting and Lumps or bumps?</div>
                            <div style="text-align: center;">

                                <input type="checkbox" value="1" checked id="yes" name="yes">
                                <label for="yes">Yes</label>
                                <input type="checkbox" value="1" checked id="No" name="No">
                                <label for="No">No</label>
                            </div>

                        </div>
                        <div style="padding-bottom: 1.5rem;">
                            <div>Does your pet  Limping?</div>
                            <div style="text-align: center;">

                                <input type="checkbox" value="1" checked id="yes" name="yes">
                                <label for="yes">Yes</label>
                                <input type="checkbox" value="1" checked id="No" name="No">
                                <label for="No">No</label>
                            </div>

                        </div>
                        <div style="padding-bottom: 1.5rem;">
                            <div>Does your pet Bad Breath?</div>
                            <div style="text-align: center;">

                                <input type="checkbox" value="1" checked id="yes" name="yes">
                                <label for="yes">Yes</label>
                                <input type="checkbox" value="1" checked id="No" name="No">
                                <label for="No">No</label>
                            </div>

                        </div>
                        <div style="padding-bottom: 1.5rem;">
                            <div>Does your pet Coughing?</div>
                            <div style="text-align: center;">

                                <input type="checkbox" value="1" checked id="yes" name="yes">
                                <label for="yes">Yes</label>
                                <input type="checkbox" value="1" checked id="No" name="No">
                                <label for="No">No</label>
                            </div>

                        </div>
                        <div style="padding-bottom: 1.5rem;">
                            <div>Does your pet Appetite or drinking changes?</div>
                            <div style="text-align: center;">

                                <input type="checkbox" value="1" checked id="yes" name="yes">
                                <label for="yes">Yes</label>
                                <input type="checkbox" value="1" checked id="No" name="No">
                                <label for="No">No</label>
                            </div>

                        </div>
                        <div style="padding-bottom: 1.5rem;">
                            <div>Does your pet Urine or defaecation changes?</div>
                            <div style="text-align: center;">

                                <input type="checkbox" value="1" checked id="yes" name="yes">
                                <label for="yes">Yes</label>
                                <input type="checkbox" value="1" checked id="No" name="No">
                                <label for="No">No</label>
                            </div>

                        </div>
                        <div style="padding-bottom: 1.5rem;">
                            <div>Does your pet Eye/ Ear problems?</div>
                            <div style="text-align: center;">

                                <input type="checkbox" value="1" checked id="yes" name="yes">
                                <label for="yes">Yes</label>
                                <input type="checkbox" value="1" checked id="No" name="No">
                                <label for="No">No</label>
                            </div>

                        </div>
                        <div style="padding-bottom: 1.5rem;">
                            <div>Does your pet Itching/ skin irritation?</div>
                            <div style="text-align: center;">

                                <input type="checkbox" value="1" checked id="yes" name="yes">
                                <label for="yes">Yes</label>
                                <input type="checkbox" value="1" checked id="No" name="No">
                                <label for="No">No</label>
                            </div>

                        </div>
                        <div style="padding-bottom: 1.5rem;">
                            <div>Does your pet Lethargy/ change in demeanour or activity levels?</div>
                            <div style="text-align: center;">

                                <input type="checkbox" value="1" checked id="yes" name="yes">
                                <label for="yes">Yes</label>
                                <input type="checkbox" value="1" checked id="No" name="No">
                                <label for="No">No</label>
                            </div>

                        </div>

                        <div style="align: center;">
                            <button type="button" class="btn btn-primary " style="margin: 20px;align: center;">Post</button>
                        </div>

                    </div>

                </div>

            </div>
            <div class="col-8">

                    <h2>Tips</h2>
                    <div id="myCarousel" class="carousel slide" data-ride="carousel" style="height: 280px;width: 730px;">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">

                            <div class="item active">
                                <img src="{{ url('images/petTips.png') }}" alt="Los Angeles" style="height: 280px;width: 100%;">
                                <div class="carousel-caption">
{{--                                    <h3>Los Angeles</h3>--}}
{{--                                    <p>LA is always so much fun!</p>--}}
                                </div>
                            </div>

                            <div class="item">
                                <img src="chicago.jpg" alt="Chicago" >
                                <div class="carousel-caption">
                                    <h3>Chicago</h3>
                                    <p>Thank you, Chicago!</p>
                                </div>
                            </div>

                            <div class="item">
                                <img src="ny.jpg" alt="New York" >
                                <div class="carousel-caption">
                                    <h3>New York</h3>
                                    <p>We love the Big Apple!</p>
                                </div>
                            </div>

                        </div>

                        <!-- Left and right controls -->
                        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#myCarousel" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>

                <h2 style="margin-top: 50px">All Questions</h2>
                <div class="card post-card" style="margin-top: 10px">
                    <div class="card-body">
                        <h5>question 1</h5>
                        <p>question detail 1</p>
                    </div>
                </div>
                <div class="card post-card" style="margin-top: 10px">
                    <div class="card-body">
                        <h5>question 2 </h5>
                        <p>question detail 2</p>
                    </div>
                </div>
                <div class="card post-card" style="margin-top: 10px">
                    <div class="card-body">
                        <h5>question 3</h5>
                        <p>question detail 3 </p>
                    </div>
                </div>
                <div class="card post-card" style="margin-top: 10px">
                    <div class="card-body">
                        <h5>question 4</h5>
                        <p>question detail 4 </p>
                    </div>
                </div>
                <div class="card post-card" style="margin-top: 10px">
                    <div class="card-body">
                        <h5>question 5</h5>
                        <p>question detail 5 </p>
                    </div>
                </div>
                <div class="card post-card" style="margin-top: 10px">
                    <div class="card-body">
                        <h5>question 6</h5>
                        <p>question detail 6 </p>
                    </div>
                </div>
                <div class="card post-card" style="margin-top: 10px">
                    <div class="card-body">
                        <h5>question 7</h5>
                        <p>question detail 7 </p>
                    </div>
                </div>

            </div>

         </div>
    </div>




@endsection
