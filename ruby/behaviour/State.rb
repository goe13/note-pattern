module State
    
    class UsingState
        def initialize
            
        end
        def handle
            puts 'using state'
        end
    end
    class FreeState
        def initialize
            
        end
        def handle
            puts 'free state'
        end
    end

    class Context
        @state
        def initialize
            
        end
        def setState(state)
            @state=state
            puts 'handling state'
            @state.handle
        end
    end

    module Test

        fs = FreeState.new
        us = UsingState.new

        context = Context.new
        context.setState fs
        context.setState us
        
    end

end