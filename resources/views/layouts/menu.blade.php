<li class="{{ Request::is('produits*') ? 'active' : '' }}">
    <a href="{!! route('produits.index') !!}"><i class="fa fa-product-hunt"></i><span>Products</span></a>
</li>

<li class="{{ Request::is('downloads*') ? 'active' : '' }}">
    <a href="{!! route('downloads.index') !!}"><i class="fa fa-download"></i><span>Downloads</span></a>
</li>

<li class="{{ Request::is('contactAdresses*') ? 'active' : '' }}">
    <a href="{!! route('contactAdresses.index') !!}"><i class="fa fa-envelope-o"></i><span>mailing lists</span></a>
</li>

<!--li class="{{ Request::is('testSites*') ? 'active' : '' }}">
    <a href="{!! route('testSites.index') !!}"><i class="fa fa-file-text-o"></i><span>Test Sites</span></a>
</li-->

<li class="{{ Request::is('blog_admin*') ? 'active' : '' }}">
    <a href="{!! route('blogetc.admin.index') !!}"><i class="fa fa-edit"></i><span>Blog</span></a>
</li>
<!--li class="dropdown">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
    <i class="fa fa-globe"></i> Translations<span class="caret"></span>
  </a>
  <ul class="dropdown-menu" role="menu">
    <li class=""><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/language') }}"><i class="fa fa-flag-checkered"></i> Languages</a></li>
    <li class=""><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/language/texts') }}"><i class="fa fa-language"></i> Site texts</a></li>
  </ul>
</li-->
<li class="{{ Request::is('texteSites*') ? 'active' : '' }}">
    <a href="{!! route('texteSites.index') !!}"><i class="fa fa-file-text-o"></i><span>Text Sites</span></a>
</li>

<li class="{{ Request::is('texteSiteLangues*') ? 'active' : '' }}">
    <a href="{!! route('texteSiteLangues.index') !!}">
        <i class="fa fa-random"></i>
        <span>Translation</span></a>
</li>

<li class="{{ Request::is('languages*') ? 'active' : '' }}">
    <a href="{!! route('languages.index') !!}">
        <i class="fa fa-american-sign-language-interpreting"></i><span>Languages</span>
    </a>
</li>

<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{!! route('users.index') !!}"><i class="fa fa-users"></i><span>Users</span></a>
</li>

<!--li class="{{ Request::is('admins*') ? 'active' : '' }}">
    <a href="{!! route('admins') !!}"><i class="fa fa-users"></i><span>Admin</span></a>
</li-->

<li class="{{ Request::is('subscribs*') ? 'active' : '' }}">
    <a href="{!! route('subscribs.index') !!}"><i class="fa fa-user"></i><span>Subscribers</span></a>
</li>

<li class="{{ Request::is('contacts*') ? 'active' : '' }}">
    <a href="{!! route('contacts.index') !!}"><i class="fa fa-envelope-open"></i><span>Contacts</span></a>
</li>


<li class="{{ Request::is('socialmedia*') ? 'active' : '' }}">
    <a href="{!! route('socialmedia.index') !!}"><i class="fa fa-facebook"></i><span>Socials</span></a>
</li>

<li class="{{ Request::is('backgrounds*') ? 'active' : '' }}">
    <a href="{!! route('backgrounds.index') !!}"><i class="fa fa-file-image-o"></i><span>Backgrounds</span></a>
</li>

<li class="{{ Request::is('categories*') ? 'active' : '' }}">
    <a href="{!! route('categories.index') !!}"><i class="fa fa-bars"></i><span>Categories</span></a>
</li>

<li class="{{ Request::is('media*') ? 'active' : '' }}">
    <a href="{!! route('media.index') !!}"><i class="fa fa-file-o"></i><span>Media</span></a>
</li>

<li class="{{ Request::is('associateMedia*') ? 'active' : '' }}">
    <a href="{!! route('associateMedia.index') !!}"><i class="fa fa-file-text-o"></i><span>Media Associers</span></a>
</li>

<li class="{{ Request::is('calendars*') ? 'active' : '' }}">
    <a href="{!! route('calendars.index') !!}"><i class="fa fa-edit"></i><span>Calendars</span></a>
</li>

<li class="{{ Request::is('pageStatics*') ? 'active' : '' }}">
    <a href="{!! route('pageStatics.index') !!}"><i class="fa fa-edit"></i><span>Standard pages</span></a>
</li>

<li class="{{ Request::is('feedBack*') ? 'active' : '' }}">
    <a href="{!! route('feedBack.index') !!}"><i class="fa fa-edit"></i><span>Feed Back</span></a>
</li>

<!--li class="{{ Request::is('creditCards*') ? 'active' : '' }}">
    <a href="{!! route('creditCards.index') !!}"><i class="fa fa-edit"></i><span>Credit Cards</span></a>
</li-->

