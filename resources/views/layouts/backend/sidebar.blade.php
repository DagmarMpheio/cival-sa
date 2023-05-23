<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="{{route('dashboard')}}">
            <span class="align-middle">Dashboard</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Páginas
            </li>

            <li class="sidebar-item {{request()->route()->getName() == 'dashboard' ? 'active-yellow':''}}">
                <a class="sidebar-link" href="{{route('dashboard')}}">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>

             {{--so admin tem permissao--}}
            {{--@role('admin')--}}
            @if(check_user_permissions(request(),"Users@index"))
                <li class="sidebar-item {{request()->route()->getName() == 'backend.users.index' || request()->route()->getName() == 'backend.users.edit' || request()->route()->getName() == 'backend.users.create' ? 'active-yellow':''}}">
                    <a class="sidebar-link" href="{{route('backend.users.index')}}">
                        <i class="align-middle" data-feather="users"></i> <span class="align-middle">Usuários</span>
                    </a>
                </li>
                {{--@endrole--}}
            @endif
            {{--so editor e admin têm permissao--}}
            {{-- @role(['admin','editor'])--}}
            @if(check_user_permissions(request(),"Categorias@index"))
                <li class="sidebar-item {{request()->route()->getName() == 'backend.categorias.index' || request()->route()->getName() == 'backend.categorias.edit' || request()->route()->getName() == 'backend.categorias.create' ? 'active-yellow':''}}">
                    <a class="sidebar-link" href="{{route('backend.categorias.index')}}">
                        <i class="align-middle" data-feather="package"></i> <span class="align-middle">Categorias</span>
                    </a>
                </li>
             @endif
            {{--@endrole--}}


             <li class="sidebar-item {{request()->route()->getName() == 'backend.agendas.index' ? 'active-yellow':''}}">
                <a class="sidebar-link" href="#">
                    <i class="align-middle" data-feather="book-open"></i> <span class="align-middle">Agendas</span>
                </a>
            </li>

            @if(check_user_permissions(request(),"Expedientes@index"))
                <li class="sidebar-item {{request()->route()->getName() == 'backend.horario-expediente.index' || request()->route()->getName() == 'backend.horario-expediente.index' || request()->route()->getName() == 'backend.horario-expediente.index'? 'active-yellow':''}}">
                    <a class="sidebar-link" href="{{route('backend.horario-expediente.index')}}">
                        <i class="align-middle" data-feather="clock"></i> <span class="align-middle">Horário de Expediente</span>
                    </a>
                </li>
            @endif

            <li class="sidebar-item {{request()->route()->getName() == 'backend.blog.index' || request()->route()->getName() == 'backend.blog.edit' || request()->route()->getName() == 'backend.blog.create' || request()->route()->getName() == 'backend.blog.show' || request()->route()->getName() == 'backend.blog.comment' ? 'active-yellow':''}}">
                <a class="sidebar-link" href="{{route('backend.blog.index')}}">
                    <i class="align-middle" data-feather="folder"></i> <span class="align-middle">Blog</span>
                </a>
            </li>

            @if(check_user_permissions(request(),"Servicos@index"))
                <li class="sidebar-item {{request()->route()->getName() == 'backend.servicos.index' || request()->route()->getName() == 'backend.servicos.edit' || request()->route()->getName() == 'backend.servicos.create' ? 'active-yellow':''}}">
                    <a class="sidebar-link" href="{{route('backend.servicos.index')}}">
                        <i class="align-middle" data-feather="briefcase"></i> <span class="align-middle">Serviços</span>
                    </a>
                </li>
            @endif

             <li class="sidebar-item {{request()->route()->getName() == 'backend.financas.index' ? 'active-yellow':''}}">
                <a class="sidebar-link" href="#">
                    <i class="align-middle" data-feather="dollar-sign"></i> <span class="align-middle">Finanças</span>
                </a>
            </li>

            @if(check_user_permissions(request(),"Files@index"))
                <li class="sidebar-item {{request()->route()->getName() == 'backend.multimedias.index' || request()->route()->getName() == 'backend.multimedias.create' || request()->route()->getName() == 'backend.multimedias.edit' ? 'active-yellow':''}}">
                    <a class="sidebar-link" href="{{route('backend.multimedias.index')}}">
                        <i class="align-middle" data-feather="film"></i> <span class="align-middle">Multimédia</span>
                    </a>
                </li>
            @endif

            @if(check_user_permissions(request(),"Faqs@index"))
                <li class="sidebar-item {{request()->route()->getName() == 'backend.faqs.index' || request()->route()->getName() == 'backend.faqs.edit' || request()->route()->getName() == 'backend.faqs.create' ? 'active-yellow':''}}">
                    <a class="sidebar-link" href="{{route('backend.faqs.index')}}">
                        <i class="align-middle" data-feather="help-circle"></i> <span class="align-middle">FAQS</span>
                    </a>
                </li>
            @endif

            <li class="sidebar-header">
				Conta
			</li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="align-middle" data-feather="log-out"></i> <span class="align-middle">Terminar Sessão</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>

            
        </ul>
    </div>
</nav>
