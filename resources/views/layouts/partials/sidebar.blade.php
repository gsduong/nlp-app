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
                    <li {{Route::is('stopword.index')? 'class=active':''}}>
                        <a href="{{route('stopword.index')}}">
                            <i class="material-icons">text_fields</i>
                            <span>Stop Words</span>
                        </a>
                    </li>
                    <li {{Route::is('intent.index')? 'class=active':''}}>
                        <a href="{{route('intent.index')}}">
                            <i class="material-icons">layers</i>
                            <span>Intents</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- #Menu -->
        </aside>
        <!-- #END# Left Sidebar -->
    </section>