<div id="firms_table_container" class="tab-pane tablediv row-fluid">
    <div class="span12">
        <h4>Firmen</h4>
        <table cellpadding="0" cellspacing="0" border="0" class="table-condensed table table-striped table-bordered" id="firms_table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Ansprechpartner</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($firms as $firm)
                <tr>
                    <td>#{{$firm->id}}</td>
                    <td>{{$firm->name}}</td>
                    <td>{{$firm->contact_name}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>