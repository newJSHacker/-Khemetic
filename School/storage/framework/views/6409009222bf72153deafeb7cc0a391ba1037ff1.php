<?php $__env->startSection('title', 'Manage Schools'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
      <?php if(\Auth::user()->role != 'master'): ?>
        <div class="col-md-2" id="side-navbar">
          <?php echo $__env->make('layouts.leftside-menubar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
      <?php endif; ?>
        <div class="col-md-<?php echo e((\Auth::user()->role == 'master')? 12 : 10); ?>" id="main-container">
            <?php if(session('status')): ?>
              <div class="alert alert-success">
                <?php echo e(session('status')); ?>

              </div>
            <?php endif; ?>
            <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>
            <div class="panel panel-default">
              <div class="panel-body table-responsive">
                <?php if(\Auth::user()->role == 'master'): ?>
                  <?php echo $__env->make('layouts.master.create-school-form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                  <h2>School List</h2>
                <?php endif; ?>
                <h4>Manage Departments, Classs, Sections, Student Promotion, Course</h4>
                <table class="table table-condensed" style="<?php echo e((\Auth::user()->role == 'master')?'':'width:800px'); ?>">
                  <thead>
                    <tr>
                      <?php if(\Auth::user()->role == 'master'): ?>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Code</th>
                        <th scope="col">About</th>
                      <?php endif; ?>
                      <?php if(\Auth::user()->role == 'admin'): ?>
                        
                        <th scope="col">Department</th>
                        <th scope="col">Classes</th>
                        
                      <?php endif; ?>
                      <?php if(\Auth::user()->role == 'master'): ?>
                        <th scope="col">+Admin</th>
                        <th scope="col">View Admins</th>
                      <?php endif; ?>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $__currentLoopData = $schools; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $school): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(\Auth::user()->role == 'master' || \Auth::user()->school_id == $school->id): ?>
                    <tr>
                      <?php if(\Auth::user()->role == 'master'): ?>
                      <td><?php echo e(($loop->index + 1)); ?></td>
                      <td><small><?php echo e($school->name); ?></small></td>
                      <td><small><?php echo e($school->code); ?></small></td>
                      <td><small><?php echo e($school->about); ?></small></td>
                      <?php endif; ?>
                      <?php if(\Auth::user()->school_id == $school->id): ?>
                        
                      <td>
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#departmentModal">+ Create Department</button>
                        <!-- Modal -->
                                  <div class="modal fade" id="departmentModal" tabindex="-1" role="dialog" aria-labelledby="departmentModalLabel">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                          <h4 class="modal-title" id="departmentModalLabel">Create Department</h4>
                                        </div>
                                        <div class="modal-body">
                                          <form class="form-horizontal" action="<?php echo e(url('school/add-department')); ?>" method="post">
                                            <?php echo e(csrf_field()); ?>

                                            <div class="form-group">
                                              <label for="department_name" class="col-sm-2 control-label">Department Name</label>
                                              <div class="col-sm-10">
                                                <input type="text" class="form-control" id="department_name" name="department_name" placeholder="English, Mathematics,...">
                                              </div>
                                            </div>
                                            <div class="form-group">
                                              <div class="col-sm-offset-2 col-sm-10">
                                                <button type="submit" class="btn btn-danger btn-sm">Submit</button>
                                              </div>
                                            </div>
                                          </form>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                      </td>
                      <td>
                        <a href="#collapse<?php echo e(($loop->index + 1)); ?>" role="button" class="btn btn-danger btn-sm" data-toggle="collapse" aria-expanded="false" aria-controls="collapse<?php echo e(($loop->index + 1)); ?>"><i class="material-icons">class</i> Manage Class, Section
                        </a>
                      </td>
                      
                      <?php endif; ?>
                      <?php if(\Auth::user()->role == 'master'): ?>
                        <td>
                          <a class="btn btn-danger btn-sm" role="button" href="<?php echo e(url('register/admin/'.$school->id.'/'.$school->code)); ?>"><small>+ Create Admin</small></a>
                        </td>
                        <td>
                          <a class="btn btn-success btn-sm" role="button" href="<?php echo e(url('school/admin-list/'.$school->id)); ?>"><small>View Admins</small></a>
                        </td>
                      <?php endif; ?>
                    </tr>
                    <?php if(\Auth::user()->school_id == $school->id): ?>
                    <tr class="collapse" id="collapse<?php echo e(($loop->index + 1)); ?>" aria-labelledby="heading<?php echo e(($loop->index + 1)); ?>" aria-expanded="false">
                      <td colspan="12">
                        <?php echo $__env->make('layouts.master.add-class-form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                          <div><small>Click Class to View All Sections</small></div>
                            <div class="row">
                              <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($class->school_id == $school->id): ?>
                                <div class="col-sm-3">
                                  <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal<?php echo e($class->id); ?>" style="margin-top: 5%;">Manage <?php echo e($class->class_number); ?> <?php echo e(!empty($class->group)? '- '.$class->group:''); ?></button>
                                  <!-- Modal -->
                                  <div class="modal fade" id="myModal<?php echo e($class->id); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog modal-lg" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                          <h4 class="modal-title" id="myModalLabel">All Sections of Class <?php echo e($class->class_number); ?></h4>
                                        </div>
                                        <div class="modal-body">
                                          <ul class="list-group">
                                            <?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                              <?php if($section->class_id == $class->id): ?>
                                              <li class="list-group-item">Section <?php echo e($section->section_number); ?> &nbsp;
                                                <a class="btn btn-xs btn-warning" href="<?php echo e(url('courses/0/'.$section->id)); ?>">View All Assigned Courses</a>
                                                <span class="pull-right"> &nbsp;&nbsp;
                                                  <a  class="btn btn-xs btn-success" href="<?php echo e(url('school/promote-students/'.$section->id)); ?>">+ Promote Students</a>
                                                  
                                                </span>
                                                <?php echo $__env->make('layouts.master.add-course-form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                              </li>
                                              <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                          </ul>
                                          <?php echo $__env->make('layouts.master.create-section-form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <?php endif; ?>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                      </td>
                    </tr>
                    <?php endif; ?>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tbody>
                </table>
                <br>
                <?php $__currentLoopData = $schools; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $school): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(\Auth::user()->role == 'admin' && \Auth::user()->school_id == $school->id): ?>
                <h4>Add Users</h4>
                <table class="table table-condensed" style="width:600px">
                  <thead>
                    <tr>
                        <th scope="col">+Student</th>
                        <th scope="col">+Teacher</th>
                        <th scope="col">+Accountant</th>
                        <th scope="col">+Librarian</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                          <a class="btn btn-info btn-sm" href="<?php echo e(url('register/student')); ?>">+ Add Student</a>
                          <br>
                          <h5>Or, Mass upload Excel</h5>
                          <?php $__env->startComponent('components.excel-upload-form', ['type'=>'student']); ?>
                          <?php echo $__env->renderComponent(); ?>
                        </td>
                        <td>
                          <a class="btn btn-success btn-sm" href="<?php echo e(url('register/teacher')); ?>">+ Add Teacher</a>
                          <br>
                          <h5>Or, Mass upload Excel</h5>
                          <?php $__env->startComponent('components.excel-upload-form', ['type'=>'teacher']); ?>
                          <?php echo $__env->renderComponent(); ?>
                        </td>
                        <td>
                          <a class="btn btn-default btn-sm" href="<?php echo e(url('register/accountant')); ?>">+ Add Accountant</a>
                        </td>
                        <td>
                          <a class="btn btn-warning btn-sm" href="<?php echo e(url('register/librarian')); ?>">+ Add Librarian</a>
                        </td>
                    </tr>
                  </tbody>
                </table>
                <br>
                <h4>Upload</h4>
                <table class="table table-condensed" style="width:400px">
                  <thead>
                    <tr>
                      <th scope="col">+Notice</th>
                      <th scope="col">+Event</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                          <a class="btn btn-info btn-sm" href="<?php echo e(url('academic/notice')); ?>"><i class="material-icons">developer_board</i> Upload Notice</a>
                        </td>
                        <td>
                          <a class="btn btn-info btn-sm" href="<?php echo e(url('academic/event')); ?>"><i class="material-icons">developer_board</i> Upload Event</a>
                        </td>
                    </tr>
                  </tbody>
                </table>
                  <?php break; ?>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
          </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>