<link rel="stylesheet" href="{{ asset('asset/css/main-text.css') }}">

@include('admin.base_style')

<style media="screen">
html,
body {
overflow-x: hidden; /* Prevent scroll on narrow devices */
}
.nav-scroller {
position: relative;
z-index: 2;
height: 2.75rem;
overflow-y: hidden;
}

.nav-scroller .nav {
display: -ms-flexbox;
display: flex;
-ms-flex-wrap: nowrap;
flex-wrap: nowrap;
padding-bottom: 1rem;
margin-top: -1px;
overflow-x: auto;
color: rgba(255, 255, 255, .75);
text-align: center;
white-space: nowrap;
-webkit-overflow-scrolling: touch;
}

.nav-underline .nav-link {
padding-top: .75rem;
padding-bottom: .75rem;
font-size: .875rem;
color: #6c757d;
}

.nav-underline .nav-link:hover {
color: #007bff;
}

.nav-underline .active {
font-weight: 500;
color: #343a40;
}

</style>

<style>
    .resac-fb-btn-default{
      background-color: #e1e1e1;
      border-radius: 30px;
      font-weight: 700;
      color: #474e52;
      border-color: transparent;    
    }

    .posts-list-elm-tag-status{
      vertical-align: middle;
      text-transform: uppercase;
      font-weight: 700;
      font-size: 12px;
    }
</style>

<style>
#resac-breadcrumb .breadcrumb{
    background-color: #fff
}
#resac-breadcrumb .breadcrumb-item+.breadcrumb-item::before {
    content: ">";
    font-weight: 700;
}
</style>