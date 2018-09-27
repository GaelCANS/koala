<style>

    .contact-form-page{
        height: 0px;
        width: 0px;
        display: block;
        border-radius: 50%;
        position: absolute;
        bottom: 20%;
        right: 0;
        overflow: hidden;
        -webkit-transition: all 0.5s;
        -moz-transition: all 0.5s;
        -o-transition: all 0.5s;
        transition: all 0.5s;
        background: #00999a;
        box-shadow: 0px 0px 19px 0px rgba(23, 72, 72, 0.49);


    }

    .show-profile{
        background: #00999a;
        height: 100%;
        display: block;
        width: 336px;
        bottom: 0;
        right: 0;
        position: absolute;
        overflow-y: scroll;
        border-radius: 0;
        padding-bottom: 30px;
        z-index: 9999;


    }

    .form-profile-img{
        float: left;
    }
    .form-profile-img img{
        border-radius: 50%;
        margin: 20px 0 0 14px;
    }
    .contact-form-page h1{
        font-size: 17px;
        color: #fff;
        font-weight: bold;
        margin: 25px 25px 15px;
        padding: 0px;
        text-align: center;
        line-height: 23px;
        text-transform: uppercase;
    }
    .top-btn{
        background: white;
        color: #00999a;
        display: block;
        padding: 5px 0;
        margin: 25px auto;
        text-align: center;
        width: 40px;
        height: 40px;
        border-radius: 50%;

        -webkit-transition: all 1s;
        -moz-transition: all 1s;
        -o-transition: all 1s;
        transition: all 1s;
        opacity: 0;
    }
    .top-btn:hover{

        background: white;
        color: #00999a;
    }

    .header-btn, .footer-btn a{
        font-size: 20px;
        color: #fff;


    }
    .form-head{
        display: block;
    }
    .cancel-btn-img{
        position: relative;
    }
    .footer-btn{
        position: relative;
    }

    .buttom-btn{
        position: fixed;
        bottom: 20%;
        right: -83px;
        background: #829ca2;
        color: #fff;
        padding: 12px;
        text-align: center;
        width: auto;
        height: auto;
        font-size: 0.80rem;
        opacity: 1;
        transform: rotate(270deg);
        box-shadow: 0px 0px 19px 0px rgba(23, 72, 72, 0.30)!important;


    }
    .buttom-btn i{
        font-size: 15px;
        padding-left: 8px;
    }



    .buttom-btn:hover{

        background:#00999a;
        color: #fff;
        text-decoration: none;
    }


    .contact-form-page form{
        padding: 0 26px;
    }

    .contact-form-page .submit-buttom{
        padding: 10px 40px;
        text-align: center;
        display: block;
        background:#829ca2;
        border: none;
        margin: 0 auto;
        border-radius: 4px;
        text-shadow: none;
        box-shadow: none;
        font-size: 16px;
        color: #ffffff;
        text-transform: uppercase;
    }

    /*
        BUTTON OPACITY STYLE
    */
    .top-btn-show{
        opacity: 1 !important;
        -webkit-transition: all 0.5s;
        -moz-transition: all 0.5s;
        -o-transition: all 0.5s;
        transition: all 0.5s;
    }
    .buttom-btn-hide{
        opacity: 0 !important;
        -webkit-transition: all 0.5s;
        -moz-transition: all 0.5s;
        -o-transition: all 0.5s;
        transition: all 0.5s;
    }
    /* GITHUB SOURCE STYLE  */
    .github-source{
        display:inline-block;
        color:#000;
        margin:20px;
        position: relative;
        z-index:999999;
    }
    .github-source i{
        font-size:50px;
        color:#fff
    }
</style>

        <div class="wrapper">
            <div class="contact-form-page">
                <div class="form-head">
                    <div class="header-btn">
                        <a class="top-btn" href="#"><i class="fa fa-times"></i></a>
                    </div>
                </div>
                <h1>Une remarque, un bug à nous remonter, c'est ici !</h1>

                {!! Form::model(
                    null,
                    array(
                        'class'     => 'form-horizontal',
                        'id'        => 'help-form',
                        'data-link' => route('send-message')
                    )
                ) !!}
                    <div class="form-group">
                        {!! Form::text( 'name' , ( auth()->user() ? auth()->user()->fullname : '' ) , array( 'class' => 'form-control font-weight-bold d-none' , 'id' => 'name-help' , 'disabled' => 'true' ) ) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::textarea( 'message' , null , array( 'class' => 'form-control' , 'rows' => '6', 'cols' => '10' , 'required' => true , 'id' => 'message-help', 'placeholder' => 'Votre message') ) !!}
                    </div>
                    {!! Form::hidden( 'page' , url()->current() , array( 'id' => 'url-help' ) ) !!}
                <button type="button" class="submit-buttom " style="display: none" id="loading-formbox"><i class="fa fa-circle-o-notch fa-spin"></i> Envoi du message</button>
                <button type="submit" class="submit-buttom" id="send-formbox">
                    Envoyer
                </button>
                {!! Form::close() !!}

            </div>
            <a class="buttom-btn" href="#">Une remarque sur CAMP <i class="fa fa-question-circle"></i></a>
        </div>

