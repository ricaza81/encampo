@extends('layouts.app')

@section('htmlheader_title')
  Home
@endsection


@section('main-content')

                <div class="box-header">
                  <h3 class="box-title">Visor de Oportunidades de Mercado (analitica de datos)</h3>
                </div><!-- /.box-header -->


<iframe class="embedly-embed" src="//cdn.embedly.com/widgets/media.html?src=https%3A%2F%2Fdatastudio.google.com%2Fembed%2Freporting%2F0c59c96a-7d93-4f3e-9c05-eeea8e946d39%2Fpage%2FmM3VB%3Ffbclid%3DIwAR2XCOsj8zcLXEAEP5Ruz548A57UknlXK3Eab-DwAk9SCFwjCtbttXwhABc%26params%3D%257B%2522df9%2522%3A%2522include%2525EE%252580%2525800%2525EE%252580%252580IN%2525EE%252580%252580<?=$usuario->empresa->nombreempresa;?>%2522%257D%26feature%3Doembed&dntp=1&display_name=Google+Data+Studio&url=https%3A%2F%2Fdatastudio.google.com%2Freporting%2F0c59c96a-7d93-4f3e-9c05-eeea8e946d39%2Fpage%2FmM3VB%3Ffbclid%3DIwAR2XCOsj8zcLXEAEP5Ruz548A57UknlXK3Eab-DwAk9SCFwjCtbttXwhABc%26params%3D%257B%2522df9%2522%3A%2522include%2525EE%252580%2525800%2525EE%252580%252580IN%2525EE%252580%252580<?=$usuario->empresa->nombreempresa;?>%2522%257D&image=https%3A%2F%2Fdatastudio.google.com%2Freporting%2F0c59c96a-7d93-4f3e-9c05-eeea8e946d39%2Fpage%2FmM3VB%2Fthumbnail%3Fsz%3Dw1200-h900-p-nu%26feature%3Doembed&key=internal&type=text%2Fhtml&schema=google" width="1200" height="1000" scrolling="no" title="Google Data Studio embed" frameborder="0" allow="autoplay; fullscreen" allowfullscreen="true"></iframe>

@endsection


@section('scripts')

<script>
cargar_grafica_barras(<?= $anio; ?>,<?= intval($mes); ?>);
cargar_grafica_lineas(<?= $anio; ?>,<?= intval($mes); ?>);
//cargar_grafica_pie();

</script>

@stop

