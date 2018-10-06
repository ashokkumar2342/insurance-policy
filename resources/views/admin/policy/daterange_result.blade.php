<table id="dataTable" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                  <th>Sn</th>                
                  <th>Policy Holder Name</th> 
          
                  <th>Father Name</th> 
                  <th>Mother Name</th> 
                  <th>Email</th> 
                  <th>Date Of Birth</th> 
                  <th>Registration No</th> 
                  <th>Policy No</th> 
                  <th width="80px">Status</th>                  
                  <th width="80px">Action</th>                  
                </tr>
                </thead>
                <tbody>
                @foreach($policys as $policy)
                <tr>
                  <td>{{ $policy->id }}</td>
                  <td>{{ $policy->policy_holder_name}}</td>
                  <td>{{ $policy->father_name }}</td>
                  <td>{{ $policy->mother_name }}</td>
                  <td>{{ $policy->email}}</td>
                  <td>{{ $policy->dob}}</td>
                  <td>{{ $policy->registration_no}}</td>
                  <td>{{ $policy->policy_no}}</td>
                  <td>
                    <span class="btn btn-xs {{ $policy->status==0?'bg-danger':'bg-success' }}">{{ $policy->status==0?'Pending':'Active'}}</span>
                  </td>
               
                  
                  <td align="center">  
                    <a class="btn btn-warning btn-xs"  href="#"><i class="fa fa-eye"></i></a>  
                    <a class="btn btn-success btn-xs"  href="#"><i class="fa fa-plus"></i></a>  
                  </td>
                 
                </tr>
                @endforeach
                </tbody>
                 
              </table> 