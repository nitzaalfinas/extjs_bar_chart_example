<html>
    <head>
        <title>EXTSJ BAR CHART</title>
        <link rel="stylesheet" href="http://localhost/ext421/resources/ext-theme-neptune/ext-theme-neptune-all.css">
        <script src="http://localhost/ext421/ext-debug.js"></script>
        <script>
            Ext.onReady(function(){
                
                Ext.define('theModel',{
                    extend: 'Ext.data.Model',
                    fields: [
                        { 
                            name: 'name', type: 'string' 
                        },
                        { 
                            name: 'dataz', type: 'int' 
                        }
                    ]
                });
                
                
                var theStore = Ext.create('Ext.data.Store',{
                    model: 'theModel',
                    autoLoad: true,
                    data: [
                        { name: "January", dataz: 10 },
                        { name: "February", dataz: 28 },
                        { name: "March", dataz: 85 }
                    ]
                    
                });
                
                var theChart = Ext.create('Ext.chart.Chart',{
                    animate: true,
                    shadow: true,
                    store: theStore,
                    axes: [
                        {
                            type: 'Numeric',
                            position: 'bottom',
                            fields: [ 'data1' ],
                            label: {
                                render: Ext.util.Format.numberRenderer('0,0')
                            },
                            title: 'Number of Hits',
                            grid: true,
                            minimum: 0,
                            maximum: 100
                        },
                        {
                            type: 'Category',
                            position: 'left',
                            fields: [ 'name' ],
                            title: 'Month'
                        }
                        
                    ],
                    
                    series: [
                        {
                            type: 'bar',
                            axis: 'bottom',
                            highlight: true,
                            xField: 'name',
                            yField: 'dataz'
                            /* activate this if you want to create a thing like tooltips
                            tips: {
                                trackMouse: true,
                                width: 140,
                                height: 28,
                                renderer: function(storeItem, item) {
                                    this.setTitle(storeItem.get('name') + ': ' + storeItem.get('dataz') + ' views');
                                }
                            },
                            label: {
                                display: 'insideEnd',
                                field: 'dataz',
                                renderer: Ext.util.Format.numberRenderer('0'),
                                orientation: 'horizontal',
                                color: '#333','text-anchor': 'middle'
                            },
                            */
                        }
                    ]
                });
                
                var theWindow = Ext.create('Ext.window.Window',{
                    title: 'Window',
                    width: 600,
                    height: 400,
                    bodyPadding: 15,
                    layout: {
                        type: 'fit'
                    },
                    items: [ theChart ]
                });
                
                theWindow.show();
                
            });
        </script>
    </head>
    <body></body>
</html>
    