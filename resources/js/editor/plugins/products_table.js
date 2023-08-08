export default function produtsTable(editor) {
    editor.DomComponents.addType('products-table', {
        isComponent: (el) => {
            console.log(el, )
        },
        model: {
            defaults: {
                droppable: false,
                tagName: 'div',
                attributes: {
                    role: 'products_table'
                },
                name: 'Tabela produktów'  ,
                components: 
                    model =>   {
                        return `<div>
                        <br/>
                        <br/>
                        <br/>
                        <br/>
                        <br/>
                        <br/>
                        <table>
                            <tbody>
                            @foreach(test as test)
                                <tr>
                                    <td>a</td>
                                    <td>b</td>
                                    <td>c</td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                        </div>`
                    }
                
            }
            
        }
        
    });
}