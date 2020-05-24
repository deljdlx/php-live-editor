class Application {
    constructor(selector) {

        this.content = '';

        this.editor = ace.edit(selector);
        this.editor.setTheme("ace/theme/tomorrow_night");
        this.editor.session.setMode("ace/mode/php");
        this.editor.setOptions({
            //wrap: 80
            fontSize: 15
        });

        this.consoleElement = document.getElementById('console');

        this.editor.getSession().on('change', function() {
            this.sendContent();
        }.bind(this));

        this.viewer = document.getElementById('container');

        //document.getElementById('exemple-selector').addEventListener('change', (event) => {this.loadExemple(event.currentTarget.value)});

    }

    loadExemple(exemple) {
        $.ajax({
            url: 'load.php',
            method: 'get',
            data: {
                exemple: exemple
            },
            success: (response) => {
                if(response) {
                    this.editor.setValue(response.source);
                    this.loadData(response);
                }
            }
        });
    }


    sendContent() {
        $.ajax({
            url: 'parse.php',
            method: 'post',
            data: {
                content: this.editor.getValue()
            },
            success: (response) => {

                this.consoleElement.innerHTML = '';
                if(response) {
                    //this.displayErrors(response.errors)
                    //this.writeInConsole(response.output);
                    this.writeBuffers(response.buffers)
                    if(response.success) {
                        document.getElementById('container').innerHTML = '';
                        this.loadData(response);
                    }
                }
            },

            error: (response) => {
                this.consoleElement.innerHTML = '';
                let data = response.responseJSON;
                if(data) {
                    this.displayErrors(data.errors);
                }
            }
        });
    }

    loadData(data) {
        console.log(data);
        if(data.variables) {
            for(let variableName in data.variables) {
                this.renderVariable(data.variables[variableName]);
            }

        }
    }

    renderVariable(descriptor) {
        document.getElementById('container').innerHTML += descriptor.html;
    }


    writeBuffers(buffers)
    {
        for(let buffer of buffers)
        {
            this.writeInConsole(buffer.content, buffer.type);
        }
    }


    displayErrors(errors) {
        for(let error of errors) {
            let message = document.createElement('pre');
            message.classList.add('message', 'error');
            message.innerHTML = error.line + ' : '+error.errstr;
            this.consoleElement.appendChild(message);
        }
    }

    writeInConsole(content, cssClass) {
        let message = document.createElement('pre');
        message.classList.add('message');
        if(cssClass) {
            message.classList.add(cssClass);
        }
        
        message.innerHTML = content;
        this.consoleElement.appendChild(message);
    }



}



/*


editor.setOptions({
  // editor options
  selectionStyle: 'text',// "line"|"text"
  highlightActiveLine: true, // boolean
  highlightSelectedWord: true, // boolean
  readOnly: false, // boolean: true if read only
  cursorStyle: 'smooth', // "ace"|"slim"|"smooth"|"wide"
  mergeUndoDeltas: true, // false|true|"always"
  behavioursEnabled: true, // boolean: true if enable custom behaviours
  wrapBehavioursEnabled: true, // boolean
  autoScrollEditorIntoView: undefined, // boolean: this is needed if editor is inside scrollable page
  keyboardHandler: null, // function: handle custom keyboard events

  // renderer options
  animatedScroll: false, // boolean: true if scroll should be animated
  displayIndentGuides: true, // boolean: true if the indent should be shown. See 'showInvisibles'
  showInvisibles: false, // boolean -> displayIndentGuides: true if show the invisible tabs/spaces in indents
  showPrintMargin: true, // boolean: true if show the vertical print margin
  printMarginColumn: 80, // number: number of columns for vertical print margin
  printMargin: undefined, // boolean | number: showPrintMargin | printMarginColumn
  showGutter: true, // boolean: true if show line gutter
  fadeFoldWidgets: false, // boolean: true if the fold lines should be faded
  showFoldWidgets: true, // boolean: true if the fold lines should be shown ?
  showLineNumbers: true,
  highlightGutterLine: false, // boolean: true if the gutter line should be highlighted
  hScrollBarAlwaysVisible: false, // boolean: true if the horizontal scroll bar should be shown regardless
  vScrollBarAlwaysVisible: false, // boolean: true if the vertical scroll bar should be shown regardless
  fontSize: 12, // number | string: set the font size to this many pixels
  fontFamily: undefined, // string: set the font-family css value
  maxLines: undefined, // number: set the maximum lines possible. This will make the editor height changes
  minLines: undefined, // number: set the minimum lines possible. This will make the editor height changes
  maxPixelHeight: 0, // number -> maxLines: set the maximum height in pixel, when 'maxLines' is defined.
  scrollPastEnd: 0, // number -> !maxLines: if positive, user can scroll pass the last line and go n * editorHeight more distance
  fixedWidthGutter: false, // boolean: true if the gutter should be fixed width
  theme: 'ace/theme/textmate', // theme string from ace/theme or custom?

  // mouseHandler options
  scrollSpeed: 2, // number: the scroll speed index
  dragDelay: 0, // number: the drag delay before drag starts. it's 150ms for mac by default
  dragEnabled: true, // boolean: enable dragging
  focusTimout: 0, // number: the focus delay before focus starts.
  tooltipFollowsMouse: true, // boolean: true if the gutter tooltip should follow mouse

  // session options
  firstLineNumber: 1, // number: the line number in first line
  overwrite: false, // boolean
  newLineMode: 'auto', // "auto" | "unix" | "windows"
  useWorker: true, // boolean: true if use web worker for loading scripts
  useSoftTabs: true, // boolean: true if we want to use spaces than tabs
  tabSize: 4, // number
  wrap: false, // boolean | string | number: true/'free' means wrap instead of horizontal scroll, false/'off' means horizontal scroll instead of wrap, and number means number of column before wrap. -1 means wrap at print margin
  indentedSoftWrap: true, // boolean
  foldStyle: 'markbegin', // enum: 'manual'/'markbegin'/'markbeginend'.
  mode: 'ace/mode/text' // string: path to language mode
});
 */


