 /*var tabla= document.querySelector("#tabla1");
            
            var dataTable = new DataTable(tabla, {
                perPage:5,
                perPageSelect:[5,10,15,25,35],
                firstLast:true,
                
                //firstText:'Ultimo'
                    });*/
                    var datatable = new DataTable(".tabla1", {
                        perPage:5,
                perPageSelect:[5,10,15,25,35],
                firstLast:true,
    columns: [
        // Sort the second column in ascending order
        { select: 0, sortable: true},

        { select: 1, sortable: true },

        // Hide the sixth column
        { select: 2, hidden: true },

        // Append a button to the seventh column
        { select: 3, hidden: true },

        { select: 4, hidden: true },
        { select: 5, hidden: true },
        { select: 6, hidden: true },
        { select: 7, hidden: true },
        { select: [8], hidden: false },
        
    ]
});