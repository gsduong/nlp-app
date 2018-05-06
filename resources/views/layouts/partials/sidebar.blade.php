<section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li {{Route::is('home')? 'class=active':''}}>
                        <a href="{{route('home')}}">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li {{Route::is('intent.index')? 'class=active':''}}>
                        <a href="{{route('intent.index')}}">
                            <i class="material-icons">layers</i>
                            <span>Intents</span>
                        </a>
                    </li>
                    <li {{Route::is('vocab.index')? 'class=active':''}}>
                        <a href="{{route('vocab.index')}}">
                            <i class="material-icons">layers</i>
                            <span>Vocabs</span>
                        </a>
                    </li>
{{--                     <li {{Route::is('term_intent.index')? 'class=active':''}}>
                        <a href="{{route('term_intent.index')}}">
                            <i class="material-icons">layers</i>
                            <span>Probabilities Table</span>
                        </a>
                    </li> --}}
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