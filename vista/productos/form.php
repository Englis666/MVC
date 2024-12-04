<div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-edit"></i>Productos</h1>
            <p>Ingresa los datos para registrar un producto nuevo</p>
          </div>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li>Productos</li>
              <li><a href="#"><?=$titulo?> Producto</a></li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="row">
                <div class="col-lg-6">
                  <div class="well bs-component">
                    <form class="form-horizontal" method="POST" action="?c=producto&a=Guardar">
                      <fieldset>
                        <legend><?=$titulo?>Producto</legend>
                        <div class="form-group">
                          <div class="col-lg-10">
                            <input class="form-control" name="pro_id" type="hidden" value="<?=$p->getPro_id()?>">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="Nombre">Nombre del producto</label>
                          <div class="col-lg-10">
                            <input required class="form-control" name="Nombre" type="text" placeholder="Nombre del producto" value="<?=$p->getPro_nom()?>">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="Marca">Marca</label>
                          <div class="col-lg-10">
                            <input requried class="form-control" name="Marca" type="text" placeholder="Marca" value="<?=$p->getPro_mar()?>">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="Costo">Costo del producto</label>
                          <div class="col-lg-10">
                            <input requried class="form-control" name="Costo" type="number" placeholder="Costo" value="<?=$p->getPro_cost()?>">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="Precio">Precio del producto</label>
                          <div class="col-lg-10">
                            <input requried class="form-control" name="Precio" type="number" placeholder="Precio" value="<?=$p->getPro_pre()?>">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="Cantidad">Cantidad</label>
                          <div class="col-lg-10">
                            <input requried class="form-control" name="Cantidad" type="number" placeholder="Cantidad" value="<?=$p->getPro_can()?>">
                          </div>
                        </div>



                      
                        <div class="form-group">
                          <div class="col-lg-10 col-lg-offset-2">
                            <button class="btn btn-default" type="reset">Cancel</button>
                            <button class="btn btn-primary" type="submit">Submit</button>
                          </div>
                        </div>
                      </fieldset>
                    </form>
                  </div>
                </div>

            </div>
          </div>
        </div>
      </div>
    </div>