<div style="display: flex; justify-content: space-around; flex-direction: row; background-color: black; width: 100%; height:100%"> 
    <div style="display: flex; flex-direction: row; gap:25px; padding: 4px 8px; background-color: #fff2d2">
        {foreach from=$items key=sect item=links}
        <div style="display: flex; flex-direction:column">
            <p>{$sect}</p>
            {foreach from=$links item=link}
                <span>{$link}</span>
            {/foreach}
        </div>
        {/foreach}
    </div>
</div> 