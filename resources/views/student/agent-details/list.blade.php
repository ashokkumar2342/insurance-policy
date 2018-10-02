  
 
@extends('student.layout.base')
@push('links')
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 
  <style type="text/css" media="screen">
     .tree, .tree ul {
         margin:0;
         padding:0;
         list-style:none
     }
     .tree ul {
         margin-left:1em;
         position:relative
     }
     .tree ul ul {
         margin-left:.5em
     }
     .tree ul:before {
         content:"";
         display:block;
         width:0;
         position:absolute;
         top:0;
         bottom:0;
         left:0;
         border-left:1px solid
     }
     .tree li {
         margin:0;
         padding:0 1em;
         line-height:2em;
         color:#369;
         font-weight:700;
         position:relative
     }
     .tree ul li:before {
         content:"";
         display:block;
         width:10px;
         height:0;
         border-top:1px solid;
         margin-top:-1px;
         position:absolute;
         top:1em;
         left:0
     }
     .tree ul li:last-child:before {
         background:#fff;
         height:auto;
         top:1em;
         bottom:0
     }
     .indicator {
         margin-right:5px;
     }
     .tree li a {
         text-decoration: none;
         color:#369;
     }
     .tree li button, .tree li button:active, .tree li button:focus {
         text-decoration: none;
         color:#369;
         border:none;
         background:transparent;
         margin:0px 0px 0px 0px;
         padding:0px 0px 0px 0px;
         outline: 0;
     }
        </style>
@endpush
@section('body')
<section class="content-header">
    <h1> Agent<small>List</small> </h1>
      <ol class="breadcrumb">
       <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>        
      </ol>
</section>
    <section class="content">        
        {{Form::close()}}
        <div class="box">        
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">              
                    <div class="col-lg-12">                      
                         <ul id="tree1" class="list-group">
                             @foreach($categories as $category)

                                 <li class="list-group-item">  Name : {{ $category->name }} , Email : {{ $category->email }}, Mobile No : {{ $category->mobile }} <span class="badge">{{ count($category->childs) }}</span>

                                     @if(count($category->childs))
                                         @include('student.agent-details.manageChild',['childs' => $category->childs])
                                     @endif
                                 </li>
                             @endforeach
                         </ul>           
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection
 
 @push('scripts')
 
   <script>
  $.fn.extend({
      treed: function (o) {
        
        var openedClass = 'glyphicon-minus-sign';
        var closedClass = 'glyphicon-plus-sign';
        
        if (typeof o != 'undefined'){
          if (typeof o.openedClass != 'undefined'){
          openedClass = o.openedClass;
          }
          if (typeof o.closedClass != 'undefined'){
          closedClass = o.closedClass;
          }
        };
        
          //initialize each of the top levels
          var tree = $(this);
          tree.addClass("tree");
          tree.find('li').has("ul").each(function () {
              var branch = $(this); //li with children ul
              branch.prepend("<i class='indicator glyphicon " + closedClass + "'></i>");
              branch.addClass('branch');
              branch.on('click', function (e) {
                  if (this == e.target) {
                      var icon = $(this).children('i:first');
                      icon.toggleClass(openedClass + " " + closedClass);
                      $(this).children().children().toggle();
                  }
              })
              branch.children().children().toggle();
          });
          //fire event from the dynamically added icon
        tree.find('.branch .indicator').each(function(){
          $(this).on('click', function () {
              $(this).closest('li').click();
          });
        });
          //fire event to open branch if the li contains an anchor instead of text
          tree.find('.branch>a').each(function () {
              $(this).on('click', function (e) {
                  $(this).closest('li').click();
                  e.preventDefault();
              });
          });
          //fire event to open branch if the li contains a button instead of text
          tree.find('.branch>button').each(function () {
              $(this).on('click', function (e) {
                  $(this).closest('li').click();
                  e.preventDefault();
              });
          });
      }
  });

  //Initialization of treeviews

  $('#tree1').treed();    </script>
@endpush