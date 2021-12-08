<nav class="navbar navbar-expand-lg navbar-light bg-theme navbar-web shift">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <!-- <li class="nav-item">
                                <a class="nav-link " aria-current="page" href="#">All</a>
                            </li> -->
                            <?php 
                            $count = 0;
                            foreach ($category as $row) {
                                if($count < 7){
                                    echo("<li class='nav-item'>
                                        <a class='nav-link' aria-current='page' href='".base_url('category/view/'.$row->c_id)."'>".$row->category_name."</a>
                                         </li>");
                                }
                                $count++;
                            }?>          
                        </ul>
                </div>
            </div>
        </nav>
    </div>