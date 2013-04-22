<div id="participant_modal" class="modal hide" data-backdrop="true" data-keyboard="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal_label">participanta anlegen</h3>
    </div>
    <div class="modal-body">
        <form action="{{ action('data@participants') }}" method="POST" class="form-inline" id="participant_modal_form">
        <div id="sku_container_modal">
            <!--<div class="form-inline-div" id="first_sku_div">-->
            <fieldset><legend>participanta</legend><input class="span3" type="text" placeholder="participantenname" id="name1" name="name1" />
                <input class="span3" type="text" placeholder="participantenzusatz" id="name2" name="name2" />
                <input class="span3" type="text" placeholder="Plz" id="postal_code" name="postal_code" />
                <input class="span3" type="text" placeholder="Straße" id="street" name="street" />
                <input class="span3" type="text" placeholder="Ort" id="city" name="city" />
                <input class="span3" type="text" placeholder="Homepage" id="homepage" name="homepage" />
            </fieldset><fieldset><legend>Ansprechpartner</legend>
                <input class="span3" type="text" placeholder="Begrüßungsformel" id="contact_salutation" name="contact_salutation" />
                <input class="span3" type="text" placeholder="Vorname und Name" id="contact_salutation" name="contact_salutation" />
                <input class="span3" type="text" placeholder="E-Mail-Adresse" id="contact_mail" name="contact_mail" />
                <input class="span3" type="text" placeholder="Tel. Mobil" id="contact_tel1" name="contact_tel1" />
                <input class="span3" type="text" placeholder="Tel. Festnetz" id="contact_tel2" name="contact_tel2" /></fieldset>
            <!-- </div> -->
        </div>
    </form>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
        <button class="btn btn-primary" data-loading-text="Posting..." onclick="$('#participant_modal_form').submit()">Submit</button>
    </div>
</div>

@section('additional_handlebar_templates')
@parent
@include('handlebar-templates/sku-template')
@endsection

@section('js')
@parent
$(document).ready(function() {
    //alert('I am ready to pass your values my friend');
});
@endsection

@section('css')
@parent
.sku_div {
    margin-bottom: 5px;
}
@endsection