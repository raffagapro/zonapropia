<h1>Solicitud recibida</h1>

<p>Estimado(a) {{ $contact->name.' '.$contact->last_name }} hemos recibido tu solicitud, y un agente se contactara contigo en la brevedad.</p>
<h5>Tu informacion</h5>
<p>Telefono: {{ $contact->phone }}</p>
<p>Correo: {{ $contact->mail }}</p>
<p>Rango de Precio: {{ $contact->priceRange }}</p>
<p>Categoria: {{ $contact->categoria->name }}</p>