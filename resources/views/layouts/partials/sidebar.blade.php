<section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li {{Route::is('intent.index')? 'class=active':''}}>
                        <a href="{{route('intent.index')}}">
                            <i class="material-icons">layers</i>
                            <span>Intents</span>
                        </a>
                    </li>
                    <li {{Route::is('nbmodel.index')? 'class=active':''}}>
                        <a href="{{route('nbmodel.index')}}">
                            <i class="material-icons">layers</i>
                            <span>Naive Bayes Model</span>
                        </a>
                    </li>
{{--                     <li {{Route::is('console.index')? 'class=active':''}}>
                        <a href="{{route('console.index')}}">
                            <i class="material-icons">layers</i>
                            <span>Testing Console</span>
                        </a>
                    </li> --}}
                </ul>
            </div>
            <!-- #Menu -->
        </aside>
        <!-- #END# Left Sidebar -->
    </section>