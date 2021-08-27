# html-manager
simple generator html using php

example Process manager with DataTables Js

  class ProcessManager{
      const EOF_LINE = "\n";

      public $html;
      public $table;
      public function  __construct( $class = null,  $id = null) {
          $this->html = new Html;
          $this->table = new Table($class,$id);
          $this->printProcessInfo();
      }

    public function printProcessInfo()
    {
      exec("ps -ef",$output);
          $fp = fopen('json/process_manager.json', 'w');
          fwrite($fp, json_encode($output));
          fclose($fp);
    }

      public function getHtml()
      {
          $this->html->head->setTitle('Process Manager');
          $this->html->head->addMetaArray(['charset="UTF-8"',
              'http-equiv="X-UA-Compatible" content="IE=edge"',
              'name="viewport" content="width=device-width, height=device-height initial-scale=1.0"'
          ]);
          $this->html->head->addCssArray(["css/process_manager.css",
              "https://cdn.datatables.net/1.10.25/css/dataTables.jqueryui.min.css",
              "https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"
          ]);
          $this->html->head->addScriptArray(["https://code.jquery.com/jquery-3.5.1.js",
              "https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js",
              "https://cdn.datatables.net/1.10.25/js/dataTables.jqueryui.min.js",
              "https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js",
              "js/process_manager.js"
          ]);

          $this->html->body->addDataArray([$this->table->getData()], "%s");
          //$this->html->foot->addDataArray(['<script> writeData('.$this->getProcessInfo().'); </script>'], "%s" );

          return $this->html->getData();
      }
  }


    $ProcessMan = new ProcessManager( "stripe compact hover cell-border order-column", "process_lists" );

    $Table = $ProcessMan->table;

    $Table->thead->tr->th->setData( ['','UID','PID','PPID','C','STIME','TTY','TIME','CMD','!'] );
    $Table->tfoot->tr->th->value = $Table->thead->tr->th->value;

    print( $ProcessMan->getHtml() );
