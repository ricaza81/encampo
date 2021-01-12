@extends('layouts.app')

@section('htmlheader_title')
  Home
@endsection


@section('main-content')

                <div class="box-header">
                  <h3 class="box-title">Visor de Oportunidades</h3>
                </div><!-- /.box-header -->

<input type="text" id="company_name" value="<?=$usuario->empresa->nombreempresa;?>"/>

<iframe class="embedly-embed" src="//cdn.embedly.com/widgets/media.html?src=https%3A%2F%2Fdatastudio.google.com%2Fembed%2Freporting%2Fef351ad4-f3ba-4926-b05a-66a3450b25d3%2Fpage%2FmM3VB%3Ffbclid%3DIwAR2XCOsj8zcLXEAEP5Ruz548A57UknlXK3Eab-DwAk9SCFwjCtbttXwhABc%26params%3D%257B%2522df9%2522%3A%2522include%2525EE%252580%2525800%2525EE%252580%252580IN%2525EE%252580%252580<?=$usuario->empresa->nombreempresa;?>%2522%257D%26feature%3Doembed&dntp=1&display_name=Google+Data+Studio&url=https%3A%2F%2Fdatastudio.google.com%2Freporting%2Fef351ad4-f3ba-4926-b05a-66a3450b25d3%2Fpage%2FmM3VB%3Ffbclid%3DIwAR2XCOsj8zcLXEAEP5Ruz548A57UknlXK3Eab-DwAk9SCFwjCtbttXwhABc%26params%3D%257B%2522df9%2522%3A%2522include%2525EE%252580%2525800%2525EE%252580%252580IN%2525EE%252580%252580<?=$usuario->empresa->nombreempresa;?>%2522%257D&image=https%3A%2F%2Fdatastudio.google.com%2Freporting%2Fef351ad4-f3ba-4926-b05a-66a3450b25d3%2Fpage%2FmM3VB%2Fthumbnail%3Fsz%3Dw1200-h900-p-nu%26feature%3Doembed&key=internal&type=text%2Fhtml&schema=google" width="1200" height="1000" scrolling="no" title="Google Data Studio embed" frameborder="0" allow="autoplay; fullscreen" allowfullscreen="true"></iframe>

<!--<iframe id="historyframe" name="historyframe" width="1200" height="1000" src="" frameborder="0" style="border:0" allowfullscreen></iframe>-->


</div>

@endsection


@section('scripts')

<!--<script>
    $(document).ready(function() {

    var company_name;
    company_name = document.getElementById("company_name").value;
    console.log(company_name);

     var params1 = {
                            "ds5.company_name": company_name,
                            "ds9.company_name": company_name,
                            "ds17.company_name": company_name
                           
                                    };
    var params1AsString = JSON.stringify(params1);
    var encodedParams1 = encodeURIComponent(params1AsString);
    var urlencode=(JSON.stringify(encodedParams1));
    console.log(JSON.stringify(encodedParams1));

    var URL2="https://datastudio.google.com/embed/reporting/ef351ad4-f3ba-4926-b05a-66a3450b25d3/page/mM3VB/?params=" + urlencode.replace(/\"/g, "");

    $('#historyframe').attr('src',URL2);
    console.log(URL2);

	});
</script>-->



@stop

