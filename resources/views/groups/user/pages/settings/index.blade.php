@extends('groups.user.layouts.app')


@section('content')

    <!-- Container -->
    <div class="container">
        <!-- UI X -->
        <div class="ui-23">

            <div class="row">
                <div class="col-md-2 col-sm-3 px-0">
                    <!-- Nav One -->
                    <div class="ui-nav-one">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li><a href="#" class="nav-tabs-href"  data-toggle="tab"><i class="fa fa-comments"></i><span>Основные</span></a></li>
                            <li><a href="#" class="nav-tabs-href" data-toggle="tab"><i class="fa fa-asterisk"></i><span>Категории</span></a></li>
                            <li><a href="#" class="nav-tabs-href" data-toggle="tab"><i class="fa fa-building"></i><span>Building</span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col">

                    <div class="tab-content">
                        <!-- BASIC -->
                        <div role="tabpanel" class="tab-pane tab-content-item fade" id="block-one">
                            <h2><i class="fa fa-comments lblue"></i> Основные</h2>
                            @include('groups.user.pages.settings.include.basic')
                       </div>
                        <!-- Category -->
                        <div role="tabpanel" class="tab-pane tab-content-item fade" id="block-two">
                            <h2><i class="fa fa-asterisk lblue"></i> Category</h2>
                            @includeWhen(count($categories), 'groups.user.pages.settings.include.category')
                        </div>

                        <!-- Tab Pane -->
                        <div role="tabpanel" class="tab-pane tab-content-item fade" id="block-three">
                            <h2><i class="fa fa-building lblue"></i> Building</h2>
                            <p>Maecenas at urna diam. Donec et accumsan metus. Maecenas nec vehicula erat. Vestibulum dapibus aliquam elit, nec venenatis lectus consectetur at. Fusce eu elementum felis. Interdum et malesuada fames ac ante ipsum primis in faucibus. Maecenas semper tincidunt finibus. Duis rhoncus facilisis sagittis. </p>
                        </div>
                        <!-- Tab Pane -->
                        <div role="tabpanel" class="tab-pane tab-content-item fade" id="block-four">
                            <h2><i class="fa fa-university lblue"></i> University</h2>
                            <p>Curabitur imperdiet, ligula vitae dignissim venenatis, nisl lorem vulputate neque, id dictum quam magna ut leo. Donec at augue velit. Ut sit amet sem ex. Proin lectus ex, porttitor ut vulputate a, ultrices vel ipsum. Integer vitae sagittis massa. Maecenas porta magna nec libero convallis facilisis. Nam sagittis eros quis nulla.</p>
                        </div>
                        <!-- Tab Pane -->
                        <div role="tabpanel" class="tab-pane tab-content-item fade" id="block-five">
                            <h2><i class="fa fa-bookmark lblue"></i> Bookmark</h2>
                            <p>Aliquam vel tristique urna. Morbi semper mauris mauris. Cras hendrerit dapibus massa nec accumsan. Suspendisse vehicula mauris eget laoreet vestibulum. Sed dolor nunc, varius ac tincidunt in, sodales scelerisque leo. Nam faucibus nisi at arcu varius eleifend ut nec urna. Morbi aliquam, lectus non blandit luctus, tellus nunc congue nulla.</p>
                        </div>
                        <!-- Tab Pane -->
                        <div role="tabpanel" class="tab-pane tab-content-item fade" id="block-six">
                            <h2><i class="fa fa-toggle-on lblue"></i> Toggle</h2>
                            <p>Quisque elit diam, rhoncus eget pretium in, egestas id nibh. In sit amet eros est. Pellentesque consequat sed urna in vehicula. Donec finibus nisi ut felis porttitor ullamcorper. Suspendisse nulla dui, aliquet quis dui eu, pretium laoreet sapien. Maecenas cursus rhoncus dolor, in luctus eros consectetur nec.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-sm-3 px-0">
                    <!-- Nav Two -->
                    <div class="ui-nav-two">
                        <!-- Nav Tabs -->
                        <ul class="nav nav-tabs d-flex justify-content-end" role="tablist">
                            <li><a href="ui-23.html#block-four" class="nav-tabs-href"  data-toggle="tab"><i class="fa fa-university"></i><span>University</span></a></li>
                            <li><a href="ui-23.html#block-five" class="nav-tabs-href" data-toggle="tab"><i class="fa fa-bookmark"></i><span>Bookmark</span></a></li>
                            <li><a href="ui-23.html#block-six" class="nav-tabs-href" data-toggle="tab"><i class="fa fa-toggle-on"></i><span>Toggle</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div><!-- /UI X -->
    </div><!-- /Container -->

@endsection


@section('footer')
    <script>

        //category
        if (document.querySelector('.ui-item-element'))
        {
            const elements = document.querySelectorAll('.ui-item-element');
            const params = [];

            const saveBtn = document.querySelector('#saveBtn');
            const saveInput = document.querySelector('#saveInput');
            const saveForm = document.querySelector('#saveForm');
            saveBtn.addEventListener('click', () => {
                if (params.length)
                {
                    saveInput.value = JSON.stringify(params);
                    saveForm.submit();
                } else{
                    alert('Вы ничего не выбрали')
                }
            })

            elements.forEach(el => {
                el.addEventListener('click', () => {
                    const item = el.querySelector('.ui-item');
                    const icon = el.querySelector('.ui-icons');
                    const id = Number(el.dataset.id);

                    if (item.classList.contains('active'))
                    {
                        item.classList.remove('active');
                        icon.classList.remove('visible');
                        params.splice(params.indexOf(id), 1);
                    }  else{
                        item.classList.add('active');
                        icon.classList.add('visible');
                        params.push(id);
                    }


                })
            })

        }


        // tabs main form
        if (document.querySelector('.nav-tabs-href'))
        {
            const buttons = document.querySelectorAll('.nav-tabs-href');
            const contents = document.querySelectorAll('.tab-content-item');

            buttons[0].parentElement.classList.add('active')
            contents[0].classList.add('active')
            contents[0].classList.remove('fade')

            buttons.forEach( (btn, index) => {
                btn.addEventListener('click', (e) => {
                    e.preventDefault();

                    buttons.forEach(x => x.parentElement.classList.remove('active'))
                    contents.forEach(y => {
                        y.classList.remove('active')
                        y.classList.add('fade')
                    })

                    contents[index].classList.add('active')
                    contents[index].classList.remove('fade')
                    btn.parentElement.classList.add('active')
                })
            })

        }
    </script>
@endsection