@php
    $categories = App\Models\Category::orderBy('name_eng', 'ASC')->get();
@endphp

<div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
    <nav class="yamm megamenu-horizontal">
        <ul class="nav">
            @foreach($categories as $category)
                <li class="dropdown menu-item"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="icon {{ $category->category_icon }}" aria-hidden="true"></i>
                        @if(session()->get('language') === 'bangla')
                            {{$category->name_bng}}
                        @else
                            {{$category->name_eng}}
                        @endif
                    </a>
                    <ul class="dropdown-menu mega-menu">
                        <li class="yamm-content">
                            <div class="row">
                                @php
                                    $subcategories = App\Models\SubCategory::where('category_id',$category->id)->orderBy('name_eng','ASC')->get();
                                @endphp
                                @foreach($subcategories as $subcategory)
                                    <div class="col-sm-12 col-md-3">
                                        <h2 class="title">
                                            @if(session()->get('language') === 'bangla')
                                                {{$subcategory->name_bng}}
                                            @else
                                                {{$subcategory->name_eng}}
                                            @endif
                                        </h2>
                                        <ul class="links list-unstyled">
                                            @php
                                                $subsubcategories = App\Models\SubSubCategory::where('subcategory_id', $subcategory->id)->orderBy('name_eng','ASC')->get();
                                            @endphp
                                            @foreach($subsubcategories as $subsubcategory)
                                                <li><a href="#">
                                                        @if(session()->get('language') === 'bangla')
                                                            {{$subsubcategory->name_bng}}
                                                        @else
                                                            {{$subsubcategory->name_eng}}
                                                        @endif
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                            @endforeach
                            <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </li>
                        <!-- /.yamm-content -->
                    </ul>
                    <!-- /.dropdown-menu -->
                </li>
                <!-- /.menu-item -->
            @endforeach
        </ul>
        <!-- /.nav -->
    </nav>
    <!-- /.megamenu-horizontal -->
</div>
