<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel 5.8 - Individual Column Search in Datatables using Ajax</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
</head>
<body>
<div class="container">
    <br />
    <h3 align="center">Daftar Homestay AJAXIN AJA</h3>
    <br />
    <br />
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4" >
            <div class="form-group"hidden>
                <select name="filter_gender" id="filter_gender" class="form-control" required>
                    <option value="">Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            <div class="form-group">
                <select name="filter_country" id="filter_country" class="form-control" required>
                    <option value="">Select Country</option>
                    @foreach($country_name as $country)

                        <option value="{{ $country->id }}">{{ $country->id }}</option>

                    @endforeach
                </select>
            </div>

            <div class="form-group" align="center">
                <button type="button" name="filter" id="filter" class="btn btn-info">Filter</button>

                <button type="button" name="reset" id="reset" class="btn btn-default">Reset</button>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>
    <br />
    <div class="table-responsive">
        <table id="customer_data" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Nama Homestay</th>
                <th>dekripsi</th>
                <th>harga</th>
                <th>provinsi_id</th>
                <th>kota_id</th>
                <th>district_id</th>
            </tr>
            </thead>
        </table>
    </div>
    <br />
    <br />
</div>
</body>
</html>

<script>
    $(document).ready(function(){

        fill_datatable();

        function fill_datatable(filter_gender = '', filter_country = '')
        {
            var dataTable = $('#customer_data').DataTable({
                processing: true,
                serverSide: true,
                ajax:{
                    url: "{{ route('customsearch.index') }}",
                    data:{ filter_country:filter_country}
                },
                columns: [
                    {
                        data:'nama_homestay',
                        name:'nama_homestay'
                    },

                    {
                        data:'deskripsi',
                        name:'deskripsi'
                    },

                    {
                        data:'harga',
                        name:'harga'
                    },
                    {
                        data:'provinsi_id',
                        name:'provinsi_id'
                    },
                    {
                        data:'kota_id',
                        name:'kota_id'
                    },
                    {
                        data:'district_id',
                        name:'district_id'
                    }
                ]
            });
        }

        $('#filter').click(function(){
            var filter_gender = $('#filter_gender').val();
            var filter_country = $('#filter_country').val();

            if(filter_gender != '' &&  filter_gender != '')
            {
                $('#customer_data').DataTable().destroy();
                fill_datatable(filter_gender, filter_country);
            }
            else
            {
                $('#customer_data').DataTable().destroy();
                fill_datatable(filter_gender, filter_country);
            }
        });

        $('#reset').click(function(){
            $('#filter_gender').val('');
            $('#filter_country').val('');
            $('#customer_data').DataTable().destroy();
            fill_datatable();
        });

    });
</script>
